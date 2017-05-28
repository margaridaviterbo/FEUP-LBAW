<?php

include_once('../../config/init.php');
include_once('../../database/event.php');

$comment = $_POST['editor'];
$user_id = $_POST['user_id'];
$event_id = $_POST['event_id'];

if(!isset($_SESSION['username']))
    exit();

addContent($user_id, $event_id);

$commentId = $conn->lastInsertId();

addComment($commentId, $comment);

$path = "../../pages/event/show-event-page.php?id=".$event_id;

header("location: $path");

?>