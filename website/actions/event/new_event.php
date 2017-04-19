<?php

include_once('../../config/init.php');
include_once('../../database/event.php');

$name = $_POST["event-name"];
$beginning_date = $_POST["beginning-event-date"];
$beginning_time = $_POST["beginning-event-time"];
$recurrence = $_POST["recurrence"];
//$ending_date = $_POST[""];
//$ending_time = $_POST[""];
$ending_date = null;
$ending_time = null;
//$local = $_POST["local"];
$category = $_POST["category"];
$description = $_POST["description"];
$price = $_POST["paid"];
$photo = $_POST["event-photo"];
$latitude = $_POST["lat"];
$longitude = $_POST["lng"];

if ($price == null || $price==false)
    $free = true;
else
    $free = false;

$state = true;


//TESTE:
$local=1;
createMetaEvent($name, $description, $recurrence, $state, $photo, $ending_date, $ending_time, $free, $_SESSION['user_id'], $category, $local);

$id = $conn->lastInsertId();
createEvent($name, $description, $beginning_date, $beginning_time, $ending_date, $ending_time, $photo, $free, $id, $local, $state);

//TESTE
global $conn;
$stmt = $conn->prepare('INSERT INTO public.city(city_id, name, country_id) VALUES (?, ?, ?)');
$stmt->execute(array(1, "lol", $local));

echo '<script> window.location.href = "../../index.php"; </script>';

?>