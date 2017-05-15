<?php

include_once('../../config/init.php');
include_once('../../database/event.php');
include_once('../../database/localization.php');

$rate = $_POST["rating"];
$id = $_POST['id'];

if(!isset($_SESSION['username']))
    exit();

$v = hasVoted($_SESSION['user_id']);


if($v[0]["res"] !=1)
    rateEvent($_SESSION['user_id'], $id, $rate);


echo '<script> window.location.href = "../../pages/event/show-event-page.php?id=',$id,'"; </script>';

?>