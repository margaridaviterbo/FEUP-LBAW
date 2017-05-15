<?php
    
    function insertComment($userid, $eventid, $comment, $url){
        global $conn;
        $stmt = $conn->prepare('INSERT INTO public.comments(content, photo_url,comment_date,event_id,user_id) VALUES (?, ?, NOW(),?,?)');
        $stmt->execute(array($comment, $url, $eventid, $userid));
    }


    function rateEvent($userid, $eventid, $rate){
        global $conn;
        $stmt = $conn->prepare('INSERT INTO public.rate(event_content_id, user_id,evaluation) VALUES (?, ?,?)');
        $stmt->execute(array($eventid, $userid, $rate));
    }

function getRating($eventid) {
    global $conn;
        $stmt = $conn->prepare('select cast(AVG(evaluation) as int) as avg from rate where event_content_id=?;');
        $stmt->execute(array($eventid));
        return $stmt->fetchAll();
}


function hasVoted($userid) {
    global $conn;
    $stmt = $conn->prepare('select 1 as res from rate where event_content_id=?;');
    $stmt->execute(array($userid));
    return $stmt->fetchAll();
}


    

function getComments($event_id){
    global $conn;
    $stmt = $conn->prepare('SELECT * from Comments where event_id=?');
    $stmt->execute(array($event_id));
    return $stmt->fetchAll();
}


function createMetaEvent($name, $description, $beginning_date, $beginning_time, $ending_date, $ending_time, $photo, $free, $public, $owner, $category, $local){
    global $conn;
    $state = 0;

    echo $beginning_date;
    $beginning = date('Y-m-d H:i:s', strtotime("$beginning_date $beginning_time"));
    $ending = date('Y-m-d H:i:s', strtotime("$ending_date $ending_time"));
    echo $beginning;

    $stmt = $conn->prepare('INSERT INTO public.meta_event(name, description, beginning_date, ending_date, meta_event_state, photo_url, free, "public", owner_id, category_id, local_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $description, $beginning, $ending, $state, $photo, $free, $public, $owner, $category, $local));
}

function createEvent($name, $description, $beginning_date, $beginning_time, $ending_date, $ending_time, $photo, $free, $public, $meta_event_id, $local){
    global $conn;
    $state = 0;
    $beginning = date('Y-m-d H:i:s', strtotime("$beginning_date $beginning_time"));
    $ending = date('Y-m-d H:i:s', strtotime("$ending_date $ending_time"));

    $stmt = $conn->prepare('INSERT INTO public.event(name, description, beginning_date, ending_date, event_state, photo_url, free, public, meta_event_id, local_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $description, $beginning, $ending, $state, $photo, $free, $public, $meta_event_id, $local));
}

function getEventsCreatedByUser($username, $page){
    global $conn;
    $stmt = $conn->prepare('SELECT meta_event.meta_event_id as id, meta_event.name as name, meta_event.beginning_date, meta_event.free, city.name as city, country.name as country FROM public.meta_event 
                            INNER JOIN public.authenticated_user ON public.meta_event.owner_id = public.authenticated_user.user_id
                            INNER JOIN public.localization ON public.meta_event.local_id = public.localization.local_id
                            INNER JOIN public.city ON public.city.city_id = public.localization.city_id
                            INNER JOIN public.country ON public.country.country_id = public.city.country_id
                            WHERE public.authenticated_user.username = ?
                            LIMIT 10 OFFSET ? * 10');
    $stmt->execute(array($username, $page));
    return $stmt->fetchAll();
}

function getMetaEvent($event_id){
    global $conn;
    $stmt = $conn->prepare('SELECT authenticated_user.username, meta_event.name as name, meta_event.beginning_date, meta_event.free, meta_event.description, meta_event.photo_url, city.name as city, country.name as country, localization.street, localization.latitude, localization.longitude FROM public.meta_event 
                            INNER JOIN public.authenticated_user ON public.meta_event.owner_id = public.authenticated_user.user_id
                            INNER JOIN public.localization ON public.meta_event.local_id = public.localization.local_id
                            INNER JOIN public.city ON public.city.city_id = public.localization.city_id
                            INNER JOIN public.country ON public.country.country_id = public.city.country_id
                            WHERE public.meta_event.meta_event_id = ?');
    $stmt->execute(array($event_id));
    return $stmt->fetch();
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
	$stringFP = "";
	$stringConTotalSerch = '';
	if(!($free))
		$stringFP = " free = false";
	
	if(!($paid))
		$stringFP = " free = true";
	
	if(!($paid) && !($free))
		$stringFP = " free = true AND free = false";
	
	if($nameOrPrice == 2){ //name
		if(!($paid) || !($free))
			$stringFP = ' WHERE upper(public.Event.name) LIKE upper(?) AND' . $stringFP;
		else
			$stringFP = ' WHERE upper(public.Event.name) LIKE upper(?)';
		$stringnNOP = "name $asc"; //"name, price" falta implementar o price
	}else{
			if(!($paid) || !($free))
				$stringFP = ' WHERE' . $stringFP;
		$stringnNOP = "score $asc"; //"price, name" falta implementar o price
		$stringConTotalSerch = ' AND score > 0';
	}
    $stmt = $conn->prepare('SELECT cityName, name, photo_url, beginning_date, ending_date, free, eventInfo.eveId, rate, score
							FROM
								(SELECT public.City.name AS cityName,
										public.Event.name AS name,
										public.Event.photo_url,
										public.Event.beginning_date,
										public.Event.ending_date,
										public.Event.free,
										public.Event.event_id AS eveId,
										ts_rank_cd(
											 to_tsvector(\'portuguese\', concat_ws(\' \', public.Event.name::text, public.Event.description::text)),
											 to_tsquery(\'portuguese\', ?)
										) AS score
								FROM ((public.Event 
									 INNER JOIN public.Localization ON (public.Event.local_id = public.Localization.local_id))
									 INNER JOIN public.City ON (public.City.city_id = public.Localization.city_id))'
								. $stringFP . 
								') AS eventInfo,
								(SELECT public.Event.event_id AS avgEvId, AVG(evaluation) as rate
								FROM ((public.Rate 
									 INNER JOIN public.Event_Content ON (public.Rate.event_content_id = public.Event_Content.event_content_id))
									 RIGHT JOIN public.Event ON (public.Event.event_id = public.Event_Content.event_id))
								GROUP BY public.Event.event_id) AS aveInfo
							WHERE (eventInfo.eveId = aveInfo.avgEvId)' . $stringConTotalSerch .
							'ORDER BY ' . $stringnNOP .
							' LIMIT 10 OFFSET ? * 10;');

	if($nameOrPrice == 2){ //name
		$stmt->execute(array($param, $param, $page));
	}else{
		$stmt->execute(array($param, $page));
	}
    return $stmt->fetchAll();
  }
?>