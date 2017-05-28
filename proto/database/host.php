<?php

function addHost($userId, $eventId){
    global $conn;
    $stmt = $conn->prepare('INSERT INTO public.host(user_id, meta_event_id) VALUES (?, ?)');
    $stmt->execute(array($userId, $eventId));
}

?>