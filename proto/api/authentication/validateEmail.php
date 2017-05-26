<?php
	$email = $_GET['email'];
  
	include_once('../../config/init.php');
    include_once($BASE_DIR . 'database/user.php');
	
	$mail = getAuthenticatedUserByEmail($email);
	$return['exists'];
	
	if(sizeof($mail) > 1){
		$return['exists'] = true;
	} else {
		$return['exists'] = false;
	}
	echo json_encode($return);
	
?>