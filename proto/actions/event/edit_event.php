<?php

include_once('../../config/init.php');
include_once('../../database/event.php');
include_once('../../database/host.php');
include_once('../../database/localization.php');

$name = $_POST["event-name"];
$beginning_date = $_POST["beginning-event-date"];
$beginning_time = $_POST["beginning-event-time"];
$ending_date = $_POST["ending-event-date"];
$ending_time = $_POST["ending-event-time"];
$recurrence = $_POST["recurrence"];
$category = $_POST["category"];
$description = $_POST["description"];
$free = $_POST["free"];
$public = $_POST["public"];
$photo = $_POST["event-photo"];
$latitude = $_POST["lat"];
$longitude = $_POST["lng"];
$street = $_POST["street"];
$city = $_POST["city"];
$country = $_POST["country"];
$eventId = $_POST["eventId"];


if(!isset($_SESSION['username']))
    exit();

if ($free == "on")
    $free = 1;
else
    $free = 0;

if ($public == "on")
    $public = 1;
else
    $public = 0;

//Get Country
if($country != null) {
    $country_id = countryAlreadyRegistered($country);

    if ($country_id == NULL || $country_id == false) {
        registerCountry($country);
        $country_id = $conn->lastInsertId();
    }
}

//Get City
if($city != null) {
    $city_id = cityAlreadyRegistered($city);

    if ($city_id == null || $city_id == false) {
        registerCity($city, $country_id);
        $city_id = $conn->lastInsertId();
    }
}

//Get local
if($latitude != null && $longitude != null) {
    $local_id = localAlreadyRegistered($latitude, $longitude);

    if ($local_id == null || $local_id == false) {
        registerLocal($latitude, $longitude, $street, $city_id);
        $local_id = $conn->lastInsertId();
    }
}

updateEvent($name, $description, $beginning_date, $beginning_time, $ending_date, $ending_time, $photo, $free, $public, $category, $local_id, $eventId);

header('Location: ../../pages/event/show-event-page.php?id=' . $eventId);

?>