<?php

include_once('../../config/init.php');
include_once('../../database/event.php');
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
$city = $_POST["city"];
$country = $_POST["country"];

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
$country_id = countryAlreadyRegistered($country);

if ($country_id == NULL || $country_id == false) {
    registerCountry($country);
    $country_id = $conn->lastInsertId();
}

//Get City
$city_id = cityAlreadyRegistered($city);

if ($city_id == null || $city_id == false) {
    registerCity($city, $country_id);
    $city_id = $conn->lastInsertId();
}

//Get local
$local_id = localAlreadyRegistered($latitude, $longitude);

if ($local_id == null || $local_id == false){
    registerLocal($latitude, $longitude, $city_id);
    $local_id = $conn->lastInsertId();
}

createMetaEvent($name, $description, $recurrence, $photo, $ending_date, $ending_time, $free, $public, $_SESSION['user_id'], $category, $local_id);
$meta_id = $conn->lastInsertId();

createEvent($name, $description, $beginning_date, $beginning_time, $ending_date, $ending_time, $photo, $free, $public, $meta_id, $local_id);

echo '<script> window.location.href = "../../index.php"; </script>';

?>