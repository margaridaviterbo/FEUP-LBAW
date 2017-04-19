<?php
  function getAllEvents($page) {
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.Event LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($page));
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
		$stringnNOP = "name"; //"name, price" falta implementar o price
	}else{
		$stringnNOP = "name"; //"price, name" falta implementar o price
	} //public.City.name AS cityName, public.Localization.street, public.Event.name AS name, public.Event.photo_url, public.Event.beginning_date, public.Event.ending_date, public.Event.free
    $stmt = $conn->prepare('SELECT *
							FROM ((public.Event 
								 INNER JOIN public.Localization ON (public.Event.local_id = public.Localization.local_id))
								 INNER JOIN public.City ON (public.City.city_id = public.Localization.city_id))
							WHERE upper(public.Event.name) LIKE upper(?)' . $stringfreee . $stringpaid .
							' ORDER BY ' . $stringnNOP . ' ' . $asc .
							' LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($param, $page));
    return $stmt->fetchAll();
  }
?>