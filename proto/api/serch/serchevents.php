<?php
	$name = $_GET['serch'];
	$page = $_GET['page'];
	$free = $_GET['free'];
	$paid = $_GET['paid'];
	$nameOrPrice = $_GET['nameOrPrice'];
	$asc = $_GET['asc'];
  
	include_once('../../config/init.php');
    include_once($BASE_DIR . 'database/event.php');
	
	$events = getSearchEvents($page, $name, $free, $paid, $nameOrPrice, $asc);
	
	echo json_encode($events);
?>