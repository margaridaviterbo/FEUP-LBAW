<?php

function createMetaEvent($name, $description, $recurrence, $photo, $expiration_date, $expiration_time, $free, $public, $owner, $category, $local){
    global $conn;
    $state = 0;
    $date = date('Y-m-d H:i:s', strtotime("$expiration_date $expiration_time"));

    $stmt = $conn->prepare('INSERT INTO public.meta_event(name, description, recurrence, meta_event_state, photo_url, expiration_date, free, public, owner_id, category_id, local_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $description, $recurrence, $state, $photo, $date, $free, $public, $owner, $category, $local));
}

function createEvent($name, $description, $beginning_date, $beginning_time, $ending_date, $ending_time, $photo, $free, $meta_event_id, $local){
    global $conn;
    $state = 0;
    $beginning = date('Y-m-d H:i:s', strtotime("$beginning_date $beginning_time"));
    $ending = date('Y-m-d H:i:s', strtotime("$ending_date $ending_time"));

    $stmt = $conn->prepare('INSERT INTO public.event(name, description, beginning_date, ending_date, event_state, photo_url, free, meta_event_id, local_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $description, $beginning, $ending, $state, $photo, $free, $meta_event_id, $local));
}

function getEventsCreatedByUser($username){
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.event 
                            INNER JOIN public.meta_event ON public.event.meta_event_id = public.meta_event.meta_event_id
                            INNER JOIN public.authenticated_user ON public.meta_event.owner_id = public.authenticated_user.user_id
                            WHERE public.authenticated_user.username = ?');
    $stmt->execute(array($username));
    return $stmt->fetchAll();
}

  /**
  $page, numero da pagina
  $name, nome do evento a procurar
  $free, true se procurar em free
  $paid, true se procurar em paid
  $nameOrPrice, true se nome false se price
  $asc, ASC ou DESC
  */
   function getSearchEvents($page, $name, $free, $paid, $nameOrPrice, $asc) {
    global $conn;
	$param = "%$name%";
	$stringfreee = "";
	$stringpaid = "";
	if(!($free))
		$stringfreee = " AND free = false";
	
	if(!($paid))
		$stringpaid = " AND free = true";
	
	if($nameOrPrice){ //name
		$stringnNOP = "name $asc"; //"name, price" falta implementar o price
	}else{
		$stringnNOP = "name $asc"; //"price, name" falta implementar o price
	}
    $stmt = $conn->prepare('SELECT cityName, street, name, photo_url, beginning_date, ending_date, free, eventInfo.eveId, rate
							FROM
								(SELECT public.City.name AS cityName, public.Localization.street, public.Event.name AS name, public.Event.photo_url, public.Event.beginning_date, public.Event.ending_date, public.Event.free, public.Event.event_id AS eveId
								FROM ((public.Event 
									 INNER JOIN public.Localization ON (public.Event.local_id = public.Localization.local_id))
									 INNER JOIN public.City ON (public.City.city_id = public.Localization.city_id))
								WHERE upper(public.Event.name) LIKE upper(?)' . $stringfreee . $stringpaid .
								') AS eventInfo,
								(SELECT public.Event.event_id AS avgEvId, AVG(evaluation) as rate
								FROM ((public.Rate 
									 INNER JOIN public.Event_Content ON (public.Rate.event_content_id = public.Event_Content.event_content_id))
									 RIGHT JOIN public.Event ON (public.Event.event_id = public.Event_Content.event_id))
								GROUP BY public.Event.event_id) AS aveInfo
							WHERE (eventInfo.eveId = aveInfo.avgEvId)
							ORDER BY ' . $stringnNOP .
							' LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($param, $page));
    return $stmt->fetchAll();
  }
?>