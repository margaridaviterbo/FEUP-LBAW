/* Get People Going to an Event */

DROP FUNCTION IF EXISTS get_people_going_to_event(eventId integer);

CREATE OR REPLACE FUNCTION get_people_going_to_event(eventId integer) RETURNS SETOF integer AS $$
  SELECT public.guest.user_id
  FROM public.guest
  INNER JOIN public.event
  ON public.event.event_id = public.guest.event_id
  WHERE public.guest.event_id = eventId AND public.guest.is_going = TRUE;
$$ LANGUAGE SQL;

--Usage
SELECT get_people_going_to_event(2) AS Guest;


/* Get Event Hosts of An Event */

DROP FUNCTION IF EXISTS get_event_hosts(metaEventId integer);

CREATE OR REPLACE FUNCTION get_event_hosts(metaEventId integer) RETURNS SETOF integer AS $$
SELECT public.host.user_id
FROM public.host
INNER JOIN public.meta_event
ON public.meta_event.meta_event_id = public.host.meta_event_id
WHERE public.host.meta_event_id = metaEventId;
$$ LANGUAGE SQL;

--Usage
SELECT get_event_hosts(2) AS Host;


/* Get Event By City */

DROP FUNCTION IF EXISTS get_events_by_city(cityName VARCHAR);

CREATE OR REPLACE FUNCTION get_events_by_city(cityName VARCHAR) RETURNS SETOF integer AS $$
SELECT public.event.event_id
FROM public.event
INNER JOIN public.localization
ON public.localization.local_id = public.event.local_id
INNER JOIN public.city
ON public.city.city_id = public.localization.city_id
WHERE public.city.name = cityName;
$$ LANGUAGE SQL;

--Usage
SELECT get_events_by_city('Vila Real') AS EventCity;


/* Get Tickets Bought By User */

DROP FUNCTION IF EXISTS get_user_tickets(userId integer);

CREATE OR REPLACE FUNCTION get_user_tickets(userId integer) RETURNS SETOF integer AS $$
SELECT public.ticket.ticket_id
FROM public.ticket
INNER JOIN public.users
ON public.users.user_id = public.ticket.user_id
WHERE public.users.user_id = userId;
$$ LANGUAGE SQL;

--Usage
SELECT get_user_tickets(1) AS UserTickets;


/* Get Events Attended By User */

DROP FUNCTION IF EXISTS get_events_attended_by_user(userId integer);

CREATE OR REPLACE FUNCTION get_events_attended_by_user(userId integer) RETURNS SETOF integer AS $$
SELECT public.event.event_id
FROM public.event
INNER JOIN public.guest
ON public.guest.event_id = public.event.event_id
INNER JOIN public.authenticated_user
ON public.authenticated_user.user_id = public.guest.user_id
WHERE public.authenticated_user.user_id = userId AND public.guest.is_going = TRUE AND public.event.beginning_date < current_date;
$$ LANGUAGE SQL;

--Usage
SELECT get_events_attended_by_user(1) AS attendedEvents;



/* Get Notifications of Admin */

DROP FUNCTION IF EXISTS get_admin_notifications(adminId integer);

CREATE OR REPLACE FUNCTION get_admin_notifications(adminId integer) RETURNS SETOF integer AS $$
SELECT public.notification.notification_id
FROM public.notification
INNER JOIN public.administrator
ON public.administrator.administrator_id = public.notification.administrator_id
WHERE public.administrator.administrator_id = adminId;
$$ LANGUAGE SQL;

--Usage
SELECT get_admin_notifications(1) AS adminNotifications;