<?php

include('../../config/init.php');
include('../../database/event.php');
include('../../database/user.php');

$meta_event_id = $_GET['event_id'];
$response = $_GET['response'];
$user_id = getUserIdFromAuthenticatedUser($_SESSION['username']);

$resp = false;
if($response == 'one'){
	$resp = 0;
} else{
	$resp = 1;
}

responseEventGuest($meta_event_id, $user_id, $resp);

echo json_encode(['ok']);

?>