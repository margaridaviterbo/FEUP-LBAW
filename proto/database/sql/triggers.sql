/* Verificar numero de bilhetes em stock quando se comprar bilhete*/

CREATE OR REPLACE FUNCTION buy_ticket() RETURNS TRIGGER AS
$BODY$
DECLARE
	num_total_tickets integer;
	num_sold_tickets integer;
BEGIN
	IF tg_op = 'INSERT' THEN
		SELECT type_ticket.num_tickets INTO num_total_tickets
		FROM Type_of_Ticket type_ticket
		WHERE new.type_of_ticket_id = type_ticket.type_of_ticket_id;

		SELECT count(*) INTO num_sold_tickets
		FROM Ticket t
		WHERE t.type_of_ticket_id = NEW.type_of_ticket_id;

		IF num_total_tickets <= num_sold_tickets THEN
			RAISE EXCEPTION 'Unable to sell ticket. No more tickets to sell. (%) (%)', num_total_tickets, num_sold_tickets;
		END IF;
	END IF;
	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER buy_ticket
BEFORE INSERT ON Ticket
FOR EACH ROW
EXECUTE PROCEDURE buy_ticket();

/* Insere owner na tabela host do evento quando cria evento*/
CREATE OR REPLACE FUNCTION add_owner_as_host() RETURNS TRIGGER AS
$BODY$
BEGIN
	IF tg_op = 'INSERT' THEN
		INSERT INTO host(user_id, meta_event_id) VALUES (NEW.owner_id, NEW.meta_event_id);
	END IF;
	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER add_owner_as_host
AFTER INSERT ON Meta_Event
FOR EACH ROW
EXECUTE PROCEDURE add_owner_as_host();

/*Delete Event Content*/

CREATE OR REPLACE FUNCTION delete_event_content() RETURNS TRIGGER AS
$BODY$
BEGIN
	IF tg_op = 'DELETE' THEN

		DELETE FROM Notification WHERE OLD.event_content_id = Notification.event_content_id;
		DELETE FROM Comments WHERE OLD.event_content_id = Comments.comment_id;
		DELETE FROM Rate WHERE OLD.event_content_id = Rate.event_content_id;
		DELETE FROM Poll WHERE OLD.event_content_id = Poll.poll_id;
	END IF;
	RETURN OLD;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER delete_event_content
BEFORE DELETE ON Event_Content
FOR EACH ROW
EXECUTE PROCEDURE delete_event_content();


/*Delete Poll*/

CREATE OR REPLACE FUNCTION delete_poll() RETURNS TRIGGER AS
$BODY$
BEGIN
	IF tg_op = 'DELETE' THEN

		DELETE FROM Poll_Unit WHERE OLD.poll_id = Poll_Unit.poll_id;

	END IF;
	RETURN OLD;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER delete_poll
BEFORE DELETE ON Poll
FOR EACH ROW
EXECUTE PROCEDURE delete_poll();

/*verifica se é possivel fazer update a um evento (visto que ja passou da data)*/
CREATE OR REPLACE FUNCTION change_event() RETURNS TRIGGER AS
$BODY$
DECLARE
	event_date TIMESTAMP;
BEGIN
	IF tg_op = 'UPDATE' THEN

		SELECT beginning_date INTO event_date
		FROM public.Event
		WHERE public.Event.event_id = OLD.event_id;

		IF event_date <= now() THEN
			RAISE EXCEPTION 'Event passed';
		END IF;

	END IF;
	RETURN OLD;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER change_event
BEFORE UPDATE ON public.Event
FOR EACH ROW
EXECUTE PROCEDURE change_event();


/*Blocks Administrator*/
CREATE OR REPLACE FUNCTION block_administrator() RETURNS TRIGGER AS
$BODY$
DECLARE
	num_total_admins INTEGER;
BEGIN
	IF tg_op = 'UPDATE' THEN

		IF NEW.active IS FALSE THEN

			SELECT COUNT(administrator_id) INTO num_total_admins
			FROM Administrator a
			WHERE a.active = true;

			IF num_total_admins <= 1 THEN
				RAISE EXCEPTION 'Unable to delete administrator. Just exists this one!';
			END IF;

		END IF;

	END IF;
	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER block_administrator
BEFORE UPDATE OF active
ON Administrator
FOR EACH ROW
EXECUTE PROCEDURE block_administrator();


/*Adicionar Notification */
CREATE OR REPLACE FUNCTION add_notification() RETURNS TRIGGER AS
$BODY$
DECLARE
	isActive BOOLEAN;
BEGIN
	IF tg_op = 'INSERT' THEN

		SELECT active INTO isActive
		FROM Administrator
		WHERE administrator_id = NEW.administrator_id;

		IF isActive IS FALSE THEN
			RAISE EXCEPTION 'Cannot add Notification. Administrator does not exist';
		END IF;

	END IF;
	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER add_notification
BEFORE INSERT	ON Notification
FOR EACH ROW
EXECUTE PROCEDURE add_notification();

CREATE OR REPLACE VIEW commentary AS
SELECT public.Comments.comment_id AS comment_id, public.Event_Content.event_id AS event_id, public.Event_Content.user_id AS maker
FROM public.Comments, public.Event_Content
WHERE public.Comments.comment_id = public.Event_Content.event_content_id;

CREATE OR REPLACE VIEW commentaryRecivers AS
SELECT public.Guest.user_id, commentary.comment_id, commentary.event_id
FROM commentary, public.Guest
WHERE commentary.event_id = public.Guest.event_id;

CREATE OR REPLACE VIEW commentaryHostRecivers AS
SELECT public.Host.user_id, commentary.comment_id, commentary.event_id
FROM commentary, public.Host
WHERE commentary.event_id = public.Host.meta_event_id;

/* Cria Notificaçao quando se cria um comentario */
CREATE OR REPLACE FUNCTION addNotificationCommented() RETURNS TRIGGER AS
$BODY$
BEGIN
	IF tg_op = 'INSERT' THEN
		INSERT INTO Notification(notification_type, checked, user_id, event_id, event_content_id)
		SELECT 'eventCommented', false, user_id, event_id, comment_id
		FROM commentaryRecivers
		WHERE commentaryRecivers.comment_id = NEW.comment_id AND user_id != (SELECT commentary.maker FROM commentary WHERE comment_id  = NEW.comment_id);
        
        INSERT INTO Notification(notification_type, checked, user_id, event_id, event_content_id)
        SELECT 'eventCommented', false, user_id, event_id, NEW.comment_id
        FROM commentaryHostRecivers
        WHERE commentaryHostRecivers.comment_id = NEW.comment_id AND user_id != (SELECT commentary.maker FROM commentary WHERE comment_id  = NEW.comment_id);
	END IF;
	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER addNotificationCommented
AFTER INSERT ON Comments
FOR EACH ROW
EXECUTE PROCEDURE addNotificationCommented();


/* Cria Notificaçao quando se e convidado */
CREATE OR REPLACE FUNCTION addNotificationInviation() RETURNS TRIGGER AS
$BODY$
BEGIN
	IF tg_op = 'INSERT' THEN
		INSERT INTO Notification(notification_type, checked, user_id, event_id) VALUES('eventInvitation', false, NEW.user_id, NEW.event_id);
	END IF;
	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER addNotificationInviation
AFTER INSERT ON Guest
FOR EACH ROW
EXECUTE PROCEDURE addNotificationInviation();