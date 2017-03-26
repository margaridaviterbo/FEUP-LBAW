-- Get People Going to an Event
CREATE OR REPLACE FUNCTION get_people_going_to_event(event_id integer) RETURNS SETOF integer AS $$
  SELECT public.event.event_id
  FROM public.event
  JOIN public.guest
  ON public.guest.event_id = public.event.event_id
  WHERE public.guest.is_going = TRUE;
$$ LANGUAGE SQL;

-- Usage
SELECT get_people_going_to_event(10) AS Guest