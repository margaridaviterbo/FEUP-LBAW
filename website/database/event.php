<?php

function createMetaEvent($name, $description, $recurrence, $state, $photo, $expiration_date, $expiration_time, $free, $public, $owner, $category, $local){
    global $conn;
    $date = date('Y-m-d H:i:s', strtotime("$expiration_date $expiration_time"));
    $stmt = $conn->prepare('INSERT INTO public.meta_event(name, description, recurrence, meta_event_state, photo_url, expiration_date, free, "public", owner_id, category_id, local_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $description, $recurrence, $state, $photo, $date, $free, $public, $owner, $category, $local));
}

function createEvent($name, $description, $beginning_date, $beginning_time, $ending_date, $ending_time, $photo, $free, $meta_event_id, $local, $state){
    global $conn;
    $beginning = date('Y-m-d H:i:s', strtotime("$beginning_date $beginning_time"));
    $ending = date('Y-m-d H:i:s', strtotime("$ending_date $ending_time"));

    $stmt = $conn->prepare('INSERT INTO public.event(name, description, beginning_date, ending_date, event_state, photo_url, free, meta_event_id, local_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $description, $beginning, $ending, $state, $photo, $free, $meta_event_id, $local));
}
?>