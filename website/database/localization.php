<?php

function createAuthenticatedUser($user_id, $username, $password){
    global $conn;
    $state = 'active';
    $stmt = $conn->prepare('INSERT INTO public.authenticated_user(user_id, username, password, user_state) VALUES (?, ?, ?, ?)');
    $stmt->execute(array($user_id, $username, sha1($password), $state));
}

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

?>