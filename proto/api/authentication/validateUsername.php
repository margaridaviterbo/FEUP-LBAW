<?php
	$username = $_GET['username'];
  
	include_once('../../config/init.php');
    include_once($BASE_DIR . 'database/user.php');
	
	$user = getByUsername($username);
	$return['exists'];
	
	if(sizeof($user) == 0){
		$return['exists'] = false;
	} else {
		$return['exists'] = true;
	}
	echo json_encode($return);
	
?>