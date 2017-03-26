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