<?php
  function getAllEvents($page) {
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.Event LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($page));
    return $stmt->fetchAll();
  }
  
   function getSearchEvents($page, $name, $free, $paid, $nameOrPrice, $asc) {
    global $conn;
	$param = "%$name%";
	$stringfreee = "";
	$stringpaid = "";
	if(!$free)
		$stringfreee = " AND free = false";
	
	if(!$paid)
		$stringpaid = " AND free = true";
	
	if($nameOrPrice) //name
		$stringnNOP = "name, price"
	else
		$stringnNOP = "price, name";
	
    $stmt = $conn->prepare('SELECT *
							FROM public.Event
							WHERE name LIKE ?' . stringfreee . stringpaid .
							' ORDER BY ' . $stringnNOP . ' ' . $asc . 
							' LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($param, $page));
    return $stmt->fetchAll();
  }
?>