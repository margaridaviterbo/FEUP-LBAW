<?php

include_once('../../config/init.php');
include_once($BASE_DIR . 'database/host.php');

$response = array();

$userId = $_POST['user'];
$eventId = $_POST['event'];

$add = isHost($userId, $eventId);

if ($add == false){
    addHost($userId, $eventId);
    $response['success'] = 'success';
}
else{
    $response['success'] = 'error';
}

echo json_encode($response);
?>