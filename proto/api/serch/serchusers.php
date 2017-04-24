<?php
	$name = $_GET['serch'];
	$page = $_GET['page'];
	$asc = $_GET['asc'];
  
	include_once('../../config/init.php');
    include_once($BASE_DIR . 'database/user.php');
	
	$users = getSearchUsers($page, $name, $asc);
	
	echo json_encode($users);
?>