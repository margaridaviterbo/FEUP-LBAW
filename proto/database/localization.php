<?php

function countryAlreadyRegistered($name){
    global $conn;
    $stmt = $conn->prepare('SELECT country_id FROM public.country WHERE public.country.name = ?');
    $stmt->execute(array($name));
    $row = $stmt->fetch();
    $id = intval($row['country_id']);
    return $id;
}

function registerCountry($name){
    global $conn;
    $stmt = $conn->prepare('INSERT INTO public.country(name) VALUES(?)');
    $stmt->execute(array($name));
}

function cityAlreadyRegistered($name){

    global $conn;
    $stmt = $conn->prepare('SELECT city_id FROM public.city WHERE public.city.name = ?');
    $stmt->execute(array($name));
    $row = $stmt->fetch();
    $id = intval($row['city_id']);
    return $id;
}

function registerCity($name, $country_id){
    global $conn;
    $stmt = $conn->prepare('INSERT INTO public.city(name, country_id) VALUES(?, ?)');
    $stmt->execute(array($name, $country_id));
}

function localAlreadyRegistered($lat, $long){

    global $conn;
    $stmt = $conn->prepare('SELECT local_id FROM public.localization WHERE public.localization.latitude = ? AND public.localization.longitude = ?');
    $stmt->execute(array($lat, $long));
    $row = $stmt->fetch();
    $id = intval($row['local_id']);
    return $id;
}

function registerLocal($lat, $long, $city_id){
    global $conn;
    $stmt = $conn->prepare('INSERT INTO public.localization(latitude, longitude, city_id) VALUES(?, ?, ?)');
    $stmt->execute(array($lat, $long, $city_id));
}

function getCityAndCountry($local_id){
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.city INNER JOIN public.country ON public.city.country_id = public.country.country_id WHERE public.localization.local_id = ?');
    return $stmt->fetch();
}

?>