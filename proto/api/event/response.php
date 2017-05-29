<?php

include('../../config/init.php');
include('../../database/event.php');
include('../../database/user.php');
include('../../database/host.php');

$meta_event_id = $_GET['event_id'];
$response = $_GET['response'];
$user_id = getUserIdFromAuthenticatedUser($_SESSION['username']);

$resp = false;
if($response == 'one'){
	$resp = 0;
} else{
	$resp = 1;
}

$guest = isGuest($user_id, $meta_event_id);

if ($guest == false){
    addGuest($user_id, $meta_event_id);
}

responseEventGuest($meta_event_id, $user_id, $resp);

echo json_encode(['ok']);

?>