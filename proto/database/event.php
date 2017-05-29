<?php


function updateMetaEvent($id, $evt, $price)
{
        global $conn;
        $stmt = $conn->prepare('update meta_event set name=?, beginning_date=?, description=?, free=? where meta_event_id=?;');
    $stmt->execute(array($evt["name"], $evt["beginning_date"], $evt["description"], $evt["free"], $id));
    if ($evt["free"] == 0) {
            $stmt = $conn->prepare('update type_of_ticket set price=? where meta_event_id=?;');
        $stmt->execute(array($price, $id));
    }
}

function updateEvent($name, $description, $beginning_date, $beginning_time, $ending_date, $ending_time, $photo_url, $free, $public, $categoryId, $localId, $eventId){
    global $conn;
    $beginning = date('Y-m-d H:i:s', strtotime("$beginning_date $beginning_time"));
    $ending = date('Y-m-d H:i:s', strtotime("$ending_date $ending_time"));

    $stmt = $conn->prepare('UPDATE public.meta_event SET name=?, description=?, beginning_date=?, ending_date = ?, photo_url = ?, free=?, public = ?, category_id = ?, local_id = ? WHERE meta_event_id=?;');
    $stmt->execute(array($name, $description, $beginning, $ending, $photo_url, $free, $public, $categoryId, $localId, $eventId));
}

function numTickets($m_event_id)
{
        global $conn;
        $stmt = $conn->prepare('select ((select SUM(num_tickets) from type_of_ticket where meta_event_id=?) - count(ticket_id)) as num_tickets from ticket where type_of_ticket_id=?');
        $stmt->execute(array($m_event_id, $m_event_id));
        return $stmt->fetch();
}

function getTypeTicket($m_event_id)
{
        global $conn;
        $stmt = $conn->prepare('select * from type_of_ticket where meta_event_id=?;');
        $stmt->execute(array($m_event_id));
        return $stmt->fetch();
}


function buy_ticket($userid, $type)  {
        global $conn;
        $stmt = $conn->prepare('insert into public.ticket(user_id, type_of_ticket_id, ticket_purchase_date) values (?, ?, ?);');
        $stmt->execute(array($userid, $type, date("d/m/Y")));
		$stmt2 = $conn->prepare('select  max(ticket_id)from public.Ticket;');
        $stmt2->execute();
		return $stmt2->fetch();
}

function addContent($userId, $eventId){

    global $conn;
    $stmt = $conn->prepare('INSERT INTO event_content(user_id, event_id) VALUES (?, ?)');
    $stmt->execute(array($userId, $eventId));
}

function addComment($commentId, $content){

    global $conn;
    $stmt = $conn->prepare('INSERT INTO comments(comment_id, content) VALUES (?, ?)');
    $stmt->execute(array($commentId, $content));

}

function hasRated($eventId, $userId){
    global $conn;
    $stmt = $conn->prepare('SELECT public.rate.event_content_id, public.rate.evaluation FROM public.rate
                              INNER JOIN public.event_content ON public.event_content.event_content_id = public.rate.event_content_id
                              WHERE public.event_content.event_id = ? AND public.event_content.user_id = ?');
    $stmt->execute(array($eventId, $userId));
    return $stmt->fetch();
}

function rateEvent($eventid, $rate){
        global $conn;
        $stmt = $conn->prepare('INSERT INTO public.rate(event_content_id, evaluation) VALUES (?, ?)');
        $stmt->execute(array($eventid, $rate));
}

function updateRateUser($contentId, $rate){
    global $conn;
    $stmt = $conn->prepare('UPDATE public.rate SET evaluation = ? WHERE event_content_id = ?');
    $stmt->execute(array($rate, $contentId));
}


function saveEvent($userid, $eventid)
{
        global $conn;
        $stmt = $conn->prepare('insert into saved_event values(?,?)');
        $stmt->execute(array($userid, $eventid));
}

function getRating($eventid)
{
    global $conn;

    $stmt = $conn->prepare('SELECT cast(avg(evaluation) as int) as eval
                                      FROM public.rate
                                      INNER JOIN public.event_content
                                      ON public.event_content.event_content_id = public.rate.event_content_id
                                      INNER JOIN public.meta_event
                                      ON public.meta_event.meta_event_id = public.event_content.event_id
                                      WHERE public.meta_event.meta_event_id = ?');
            $stmt->execute(array($eventid));
            return $stmt->fetchAll();
}


function hasVoted($userid)
{
        global $conn;
        $stmt = $conn->prepare('select 1 as res from rate where event_content_id=?;');
        $stmt->execute(array($userid));
        return $stmt->fetchAll();
}

function deleteComment($commentId){
    global $conn;
    $stmt = $conn->prepare('DELETE FROM public.comments WHERE public.comments.comment_id = ?');
    $stmt->execute(array($commentId));
}

function deleteContent($id){
    global $conn;
    $stmt = $conn->prepare('DELETE FROM public.event_content WHERE public.event_content.event_content_id = ?');
    $stmt->execute(array($id));
}

function getComments($event_id)
{
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM comments 
                            INNER JOIN event_content ON comment_id = event_content_id 
                            INNER JOIN authenticated_user ON event_content.user_id = authenticated_user.user_id
                            WHERE event_id = ?
                            ORDER BY comment_date DESC');
    $stmt->execute(array($event_id));
    return $stmt->fetchAll();
}

function listEvents()
{
    global $conn;
    $stmt = $conn->prepare('SELECT meta_event.meta_event_id as id, meta_event.name as name, meta_event.beginning_date, meta_event.free, city.name as city, country.name as country  
    from public.meta_event 
    INNER JOIN public.localization ON public.meta_event.local_id = public.localization.local_id
    INNER JOIN public.city ON public.city.city_id = public.localization.city_id
    INNER JOIN public.country ON public.country.country_id = public.city.country_id                        
    where public.meta_event.beginning_date > now() ORDER BY beginning_date ASC');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getPastEvents($userid)
{
    global $conn;
    $stmt = $conn->prepare('SELECT public.meta_event.meta_event_id as id, meta_event.name as name, meta_event.beginning_date, meta_event.free, city.name as city, country.name as country FROM public.meta_event 
                              INNER JOIN public.guest ON public.meta_event.meta_event_id = public.guest.event_id
                               INNER JOIN public.localization ON public.meta_event.local_id = public.localization.local_id
                            INNER JOIN public.city ON public.city.city_id = public.localization.city_id
                            INNER JOIN public.country ON public.country.country_id = public.city.country_id
                              WHERE public.guest.user_id= ? AND public.meta_event.beginning_date < now()');
    $stmt->execute(array($userid));
    return $stmt->fetchAll();
}


function getSavedEvents($userid)
{
    global $conn;
    $stmt = $conn->prepare('select e.* from saved_event s, event e where s.meta_event_id =e.event_id and s.user_id=?;');
    $stmt->execute(array($userid));
    return $stmt->fetchAll();
}


function createMetaEvent($name, $description, $beginning_date, $beginning_time, $ending_date, $ending_time, $photo, $free, $public, $owner, $category, $local)
{
    global $conn;
    $state = 0;

    echo $beginning_date;
    $beginning = date('Y-m-d H:i:s', strtotime("$beginning_date $beginning_time"));
    $ending = date('Y-m-d H:i:s', strtotime("$ending_date $ending_time"));
    echo $beginning;

    $stmt = $conn->prepare('INSERT INTO public.meta_event(name, description, beginning_date, ending_date, meta_event_state, photo_url, free, "public", owner_id, category_id, local_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $description, $beginning, $ending, $state, $photo, $free, $public, $owner, $category, $local));
}

function createEvent($name, $description, $beginning_date, $beginning_time, $ending_date, $ending_time, $photo, $free, $public, $meta_event_id, $local)
{
    global $conn;
    $state = 0;
    $beginning = date('Y-m-d H:i:s', strtotime("$beginning_date $beginning_time"));
    $ending = date('Y-m-d H:i:s', strtotime("$ending_date $ending_time"));

    $stmt = $conn->prepare('INSERT INTO public.event(name, description, beginning_date, ending_date, event_state, photo_url, free, public, meta_event_id, local_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $description, $beginning, $ending, $state, $photo, $free, $public, $meta_event_id, $local));
}

function getEventsCreatedByUser($username, $page)
{
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

function getMainEvents()
{
    global $conn;
    $stmt = $conn->prepare('SELECT meta_event.meta_event_id as id, meta_event.name as name, meta_event.beginning_date, meta_event.free, city.name as city, country.name as country FROM public.meta_event 
                            INNER JOIN public.authenticated_user ON public.meta_event.owner_id = public.authenticated_user.user_id
                            INNER JOIN public.localization ON public.meta_event.local_id = public.localization.local_id
                            INNER JOIN public.city ON public.city.city_id = public.localization.city_id
                            INNER JOIN public.country ON public.country.country_id = public.city.country_id
                            INNER JOIN public.event_content ON public.event_content.event_id = public.meta_event.meta_event_id
                            INNER JOIN public.rate ON public.rate.event_content_id = public.event_content.event_content_id
                            ORDER BY public.rate.evaluation DESC
                            LIMIT 9');
    $stmt->execute();
    return $stmt->fetchAll();
}


function getMetaEvent($event_id)
{
    global $conn;
    $stmt = $conn->prepare('SELECT authenticated_user.username, meta_event.name as name, meta_event.beginning_date, meta_event.free, meta_event.public, meta_event.description, meta_event.photo_url, city.name as city, country.name as country, localization.street, localization.latitude, localization.longitude FROM public.meta_event 
                            INNER JOIN public.authenticated_user ON public.meta_event.owner_id = public.authenticated_user.user_id
                            INNER JOIN public.localization ON public.meta_event.local_id = public.localization.local_id
                            INNER JOIN public.city ON public.city.city_id = public.localization.city_id
                            INNER JOIN public.country ON public.country.country_id = public.city.country_id
                            WHERE public.meta_event.meta_event_id = ?');
    $stmt->execute(array($event_id));
    return $stmt->fetch();
}

function getEventName($event_id){
    global $conn;
    $stmt = $conn->prepare('SELECT public.meta_event.name as name
							FROM public.meta_event
							WHERE public.meta_event.meta_event_id = ?');
    $stmt->execute(array($event_id));
    return $stmt->fetch();
}

function getMetaEventTickets($event_id){
    global $conn;
    $stmt = $conn->prepare('SELECT *
							FROM public.Type_of_Ticket
							WHERE public.Type_of_Ticket.meta_event_id = ?');
    $stmt->execute(array($event_id));
    return $stmt->fetchAll();
}


function getTicketInfo($ticket_id){
    global $conn;
    $stmt = $conn->prepare('SELECT *
							FROM public.Type_of_Ticket
							WHERE public.Type_of_Ticket.type_of_ticket_id = ?');
    $stmt->execute(array($ticket_id));
    return $stmt->fetchAll();
}

function responseEventGuest($meta_event_id, $user_id, $response) {
	global $conn;
    $stmt = $conn->prepare('Update Guest
							SET is_going = ?
							WHERE Guest.user_id = ? AND Guest.event_id = ?');
    $stmt->execute(array($response, $user_id, $meta_event_id));
}

function responseGetResponse($meta_event_id, $user_id) {
	global $conn;
    $stmt = $conn->prepare('Select is_going 
							From Guest
							WHERE Guest.user_id = ? AND Guest.event_id = ?');
    $stmt->execute(array($user_id, $meta_event_id));
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
function getSearchEvents($page, $name, $free, $paid, $nameOrPrice, $asc)
{
    global $conn;
	$param = "%$name%";
	$stringFP = "";
	$stringConTotalSerch = '';
    if (!($free))
		$stringFP = " free = false";

    if (!($paid))
		$stringFP = " free = true";

    if (!($paid) && !($free))
		$stringFP = " free = true AND free = false";

    if ($nameOrPrice == 2) { //name
        if (!($paid) || !($free))
			$stringFP = ' WHERE upper(public.meta_event.name) LIKE upper(?) AND' . $stringFP;
		else
			$stringFP = ' WHERE upper(public.meta_event.name) LIKE upper(?)';
		$stringnNOP = "name $asc"; //"name, price" falta implementar o price
    } else {
        if (!($paid) || !($free))
				$stringFP = ' WHERE' . $stringFP;
		if($asc == "ASC")
			$asc = "DESC";
		else
			$asc = "ASC";
		$stringnNOP = "score $asc"; //"price, name" falta implementar o price
		$stringConTotalSerch = ' AND score > 0';
	}
    $stmt = $conn->prepare('SELECT cityName, name, photo_url, beginning_date, ending_date, free, eventInfo.eveId, rate, score
							FROM
								(SELECT public.City.name AS cityName,
										public.meta_event.name AS name,
										public.meta_event.photo_url,
										public.meta_event.beginning_date,
										public.meta_event.ending_date,
										public.meta_event.free,
										public.meta_event.public,
										public.meta_event.meta_event_id AS eveId,
										ts_rank_cd(
											 setweight(to_tsvector(\'portuguese\', coalesce(public.meta_event.name,\'\')), \'A\') ||
											 setweight(to_tsvector(\'portuguese\', coalesce(public.meta_event.description,\'\')), \'D\'),
											 to_tsquery(\'portuguese\', ?)
										) AS score
								FROM ((public.meta_event 
									 INNER JOIN public.Localization ON (public.meta_event.local_id = public.Localization.local_id))
									 INNER JOIN public.City ON (public.City.city_id = public.Localization.city_id))'
        . $stringFP .
								') AS eventInfo,
								(SELECT public.meta_event.meta_event_id AS avgEvId, AVG(evaluation) as rate
								FROM ((public.Rate 
									 INNER JOIN public.Event_Content ON (public.Rate.event_content_id = public.Event_Content.event_content_id))
									 RIGHT JOIN public.Meta_event ON (public.Meta_event.meta_event_id = public.Event_Content.event_id))
								GROUP BY public.meta_event.meta_event_id) AS aveInfo
							WHERE (eventInfo.eveId = aveInfo.avgEvId) AND eventInfo.public = \'true\'' . $stringConTotalSerch .
							'ORDER BY ' . $stringnNOP .
							' LIMIT 10 OFFSET ? * 10;');

    if ($nameOrPrice == 2) { //name
		$stmt->execute(array($param, $param, $page));
    } else {
		$stmt->execute(array($param, $page));
	}
    return $stmt->fetchAll();
}

?>