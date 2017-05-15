<?php

include_once('../../config/init.php');
include_once('../../database/event.php');
include_once('../../database/localization.php');

$comment = $_POST["comment"];
$id = $_POST['id'];

if(!isset($_SESSION['username']))
    exit();


insertComment($_SESSION['user_id'], $id, $comment, '');


echo '<script> window.location.href = "../../pages/event/show-event-page.php?id=',$id,'"; </script>';

?>