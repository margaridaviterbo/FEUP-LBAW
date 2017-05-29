<?php

include_once('../../config/init.php');
include_once($BASE_DIR . 'database/event.php');

$response = array();

$rate = $_POST['value'];
$eventId = $_POST['event'];
$userId = $_POST['user'];

$contentId = hasRated($eventId, $userId);

if ($contentId == false){
    addContent($userId, $eventId);
    $lastId = $conn->lastInsertId();
    rateEvent($lastId, $rate);
}
else{
    //updateRateUser($contentId['event_content_id'], intval($rate));
}

echo json_encode($response);
?>