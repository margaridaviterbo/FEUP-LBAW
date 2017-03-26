DROP SCHEMA public CASCADE;
CREATE SCHEMA public;

GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO public;

DROP TABLE IF EXISTS Administrator;

DROP TABLE IF EXISTS Authenticated_User;

DROP TABLE IF EXISTS Category;

DROP TABLE IF EXISTS City;

DROP TABLE IF EXISTS Comments;

DROP TABLE IF EXISTS Country;

DROP TABLE IF EXISTS Event;

DROP TABLE IF EXISTS Event_Content;

DROP TABLE IF EXISTS Guest;

DROP TABLE IF EXISTS Hosts;

DROP TABLE IF EXISTS JoinPoll_UnitToAuthenticated_User;

DROP TABLE IF EXISTS Localization;

DROP TABLE IF EXISTS Meta_Event;

DROP TABLE IF EXISTS Notification;

DROP TABLE IF EXISTS Notification_Intervinient;

DROP TABLE IF EXISTS Paid_Event;

DROP TABLE IF EXISTS Poll;

DROP TABLE IF EXISTS Poll_Unit;

DROP TABLE IF EXISTS Rate;

DROP TABLE IF EXISTS Saved_Event;

DROP TABLE IF EXISTS Ticket;

DROP TABLE IF EXISTS Users;

DROP TABLE IF EXISTS Host;

DROP TABLE IF EXISTS Type_of_Ticket;

CREATE TYPE notification_type AS ENUM(
    'userReport', 'eventReport', 'contentReport', 'eventCommented', 'eventCreatedPoll', 'eventRated', 'eventChangedLocal', 'eventChangedDate', 'eventChangedName', 'eventInvitation', 'eventCanceled', 'eventAllSoldTickets', 'eventReminder', 'userSentEmail'
);

CREATE TYPE Recurrence AS ENUM(
	'daily', 'weekly', 'once', 'annually', 'quarterly', 'semester'
);

CREATE FUNCTION XOR(bool,bool) RETURNS bool AS '
SELECT ($1 AND NOT $2) OR (NOT $1 AND $2);
' LANGUAGE 'sql';

CREATE TABLE public.Administrator
(
	administrator_id serial PRIMARY KEY,
	username varchar(20) UNIQUE NOT NULL,
	email varchar(254) UNIQUE NOT NULL,
	password varchar(30) NOT NULL,
	CONSTRAINT min_size CHECK (LENGTH(username) >= 8 AND LENGTH(password) >= 8)
);

CREATE TABLE public.Users
(
	user_id serial PRIMARY KEY,
	first_name varchar(20) NOT NULL,
	last_name varchar(20) NOT NULL,
	email varchar(254) UNIQUE NOT NULL,
	birthdate date,
	nif int UNIQUE,
	CONSTRAINT min_size CHECK (LENGTH(first_name) >= 3 AND LENGTH(last_name) >= 2 AND length(nif::TEXT) = 9),
	CONSTRAINT valid_date CHECK (birthdate < current_date)
);


CREATE TABLE public.Authenticated_User
(
	user_id serial PRIMARY KEY,
	username varchar(20) UNIQUE NOT NULL,
	password varchar(30) NOT NULL,
	photo_url varchar(150),
	FOREIGN KEY(user_id) REFERENCES Users(user_id),
	CONSTRAINT min_size CHECK (LENGTH(username) >= 8 AND LENGTH(password) >= 8)
);

CREATE TABLE public.Category
(
	category_id serial PRIMARY KEY,
	name varchar(50) UNIQUE NOT NULL
);

CREATE TABLE public.Country
(
	country_id serial PRIMARY KEY,
	name varchar(20) UNIQUE NOT NULL
);

CREATE TABLE public.City
(
	city_id serial PRIMARY KEY,
	name varchar(20) NOT NULL,
	country_id integer,
	FOREIGN KEY(city_id) REFERENCES Country(country_id)
);

CREATE TABLE public.Localization
(	
	local_id serial PRIMARY KEY,
  street VARCHAR(200),
	coordinates VARCHAR(100) NOT NULL,
	city_id INTEGER,
	FOREIGN KEY(city_id) REFERENCES City(city_id)
);

CREATE TABLE public.Meta_Event
(
	meta_event_id serial PRIMARY KEY,
	name varchar(50) NOT NULL,
	description varchar(2000) NOT NULL,
	recurrence Recurrence NOT NULL,
	photo_url varchar(150),
	expiration_date timestamp,
	free boolean NOT NULL,
	owner_id integer NOT NULL,
	category_id integer NOT NULL,
	local_id integer NOT NULL,
	FOREIGN KEY(owner_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(category_id) REFERENCES Category(category_id),
	FOREIGN KEY(local_id) REFERENCES Localization(local_id),
	CONSTRAINT expiration_date CHECK (expiration_date > current_date)
);

CREATE TABLE public.Event
(
	event_id serial PRIMARY KEY,
	name varchar(50) NOT NULL,
	description varchar(2000) NOT NULL,
	beginning_date timestamp NOT NULL,
	ending_date timestamp,
	photo_url varchar(150),
	free boolean NOT NULL,
	meta_event_id integer NOT NULL,
	local_id integer NOT NULL,
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id),
	FOREIGN KEY(local_id) REFERENCES Localization(local_id),
	CONSTRAINT beginning_date CHECK (beginning_date > current_date),
	CONSTRAINT end_date CHECK (ending_date > Event.beginning_date)
);

CREATE TABLE public.Event_Content
(
	event_content_id serial PRIMARY KEY,
	user_id integer NOT NULL,
	event_id integer NOT NULL,
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(event_id) REFERENCES Event(event_id)
);


CREATE TABLE public.Comments
(
	comment_id integer PRIMARY KEY,
	content varchar(500),
	photo_url varchar(150),
	comment_date timestamp NOT NULL DEFAULT now(),
	FOREIGN KEY(comment_id) REFERENCES Event_Content(event_content_id),
	CONSTRAINT valid_content CHECK (photo_url IS NOT NULL OR content IS NOT NULL)
);

CREATE TABLE public.Guest
(
	is_going boolean NOT NULL,
	user_id integer,
	event_id integer,
	PRIMARY KEY(user_id, event_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(event_id) REFERENCES Event(event_id)
);

CREATE TABLE public.Host
(
	user_id integer,
	meta_event_id integer,
	PRIMARY KEY(user_id, meta_event_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id)
);

CREATE TABLE public.Notification
(
	notification_id serial PRIMARY KEY,
	notification_date timestamp NOT NULL DEFAULT now(),
	notification_type notification_type NOT NULL,
	checked boolean NOT NULL, 
	event_id integer,
	event_content_id integer,
	user_id integer,
	administrator_id integer,
	FOREIGN KEY(event_id) REFERENCES Event(event_id),
	FOREIGN KEY(event_content_id) REFERENCES Event_Content(event_content_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(administrator_id) REFERENCES Administrator(administrator_id),
	CONSTRAINT valid_date CHECK(notification_date < current_date),
	CONSTRAINT valid_user CHECK (XOR(user_id IS NOT NULL, administrator_id IS NOT NULL))
);

CREATE TABLE public.Notification_Intervinient
(
	user_id integer,
	notification_id integer,
	PRIMARY KEY(user_id, notification_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(notification_id) REFERENCES Notification(notification_id)
);

CREATE TABLE public.Poll
(
	poll_id serial PRIMARY KEY,
	poll_type integer NOT NULL,
	poll_date timestamp NOT NULL DEFAULT now(),
  FOREIGN KEY(poll_id) REFERENCES Event_Content(event_content_id)
);

CREATE TABLE public.Poll_Unit
(
	poll_unit_id serial PRIMARY KEY,
	name varchar(20) NOT NULL,
	poll_id integer NOT NULL,
	FOREIGN KEY(poll_id) REFERENCES Poll(poll_id)
);

CREATE TABLE public.JoinPoll_UnitToAuthenticated_User
(
  user_id integer,
  poll_unit_id integer,
  PRIMARY KEY(user_id, poll_unit_id),
  FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
  FOREIGN KEY(poll_unit_id) REFERENCES Poll_Unit(poll_unit_id)
);

CREATE TABLE public.Rate
(
	event_content_id integer PRIMARY KEY,
	evaluation integer NOT NULL,
	FOREIGN KEY(event_content_id) REFERENCES Event_Content(event_content_id),
	CONSTRAINT check_evaluation CHECK (evaluation <= 10 AND evaluation > 0)
);

CREATE TABLE public.Saved_Event
(
	user_id integer,
	meta_event_id integer,
	PRIMARY KEY(user_id, meta_event_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id)
);

CREATE TABLE public.Type_of_Ticket
(
	type_of_ticket_id serial PRIMARY KEY,
	ticket_type varchar(30) NOT NULL,
	price float NOT NULL,
	num_tickets integer NOT NULL,
	meta_event_id integer,
	event_id integer,
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id),
	FOREIGN KEY(event_id) REFERENCES Event(event_id),
	CONSTRAINT positive_price CHECK (price > 0),
	CONSTRAINT valid_num_tickets CHECK (num_tickets > 0),
	CONSTRAINT has_event CHECK (meta_event_id IS NOT NULL OR event_id IS NOT NULL)
);

CREATE TABLE public.Ticket
(
	ticket_id serial PRIMARY KEY,
	name varchar(20) NOT NULL,
	nif integer NOT NULL,
	user_id integer NOT NULL,
	type_of_ticket_id integer NOT NULL,
	FOREIGN KEY(user_id) REFERENCES Users(user_id),
	FOREIGN KEY(type_of_ticket_id) REFERENCES Type_of_Ticket(type_of_ticket_id),
	CONSTRAINT valid_nif CHECK (LENGTH(nif::TEXT) = 9)
);

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



/*Delete User */

CREATE OR REPLACE FUNCTION delete_user() RETURNS TRIGGER AS
$BODY$
BEGIN
	IF tg_op = 'DELETE' THEN

		DELETE FROM Authenticated_User WHERE OLD.user_id = Authenticated_User.user_id;
		DELETE FROM Ticket WHERE OLD.user_id = Ticket.user_id;

	END IF;
	RETURN OLD;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER delete_user
BEFORE DELETE ON Users
FOR EACH ROW
EXECUTE PROCEDURE delete_user();


/*Delete Authenticated User */

CREATE OR REPLACE FUNCTION delete_authenticated_user() RETURNS TRIGGER AS
$BODY$
BEGIN
	IF tg_op = 'DELETE' THEN

		DELETE FROM Meta_Event WHERE OLD.user_id = Meta_Event.owner_id;
		DELETE FROM Saved_Event WHERE OLD.user_id = Saved_Event.user_id;
		DELETE FROM Host WHERE OLD.user_id = Host.user_id;
		DELETE FROM Guest WHERE OLD.user_id = Guest.user_id;
		DELETE FROM Notification WHERE OLD.user_id = Notification.user_id;
		DELETE FROM Notification_Intervinient WHERE OLD.user_id = Notification_Intervinient.user_id;
		DELETE FROM JoinPoll_UnitToAuthenticated_User WHERE OLD.user_id = JoinPoll_UnitToAuthenticated_User.user_id;
		DELETE FROM Event_Content WHERE OLD.user_id = Event_Content.user_id;

	END IF;
	RETURN OLD;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER delete_authenticated_user
BEFORE DELETE ON Authenticated_User
FOR EACH ROW
EXECUTE PROCEDURE delete_authenticated_user();


/*Delete Meta Event */

CREATE OR REPLACE FUNCTION delete_meta_event() RETURNS TRIGGER AS
$BODY$
BEGIN
	IF tg_op = 'DELETE' THEN

		DELETE FROM Saved_Event WHERE OLD.meta_event_id = Saved_Event.meta_event_id;
		DELETE FROM Host WHERE OLD.meta_event_id = Host.meta_event_id;
		DELETE FROM Event WHERE OLD.meta_event_id = Event.meta_event_id;

	END IF;
	RETURN OLD;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER delete_meta_event
BEFORE DELETE ON Meta_Event
FOR EACH ROW
EXECUTE PROCEDURE delete_meta_event();