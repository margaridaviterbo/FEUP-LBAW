<?php

function addHost($userId, $eventId){
    global $conn;
    $stmt = $conn->prepare('INSERT INTO public.host(user_id, meta_event_id) VALUES (?, ?)');
    $stmt->execute(array($userId, $eventId));
}

function isHost($userId, $eventId){
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.host WHERE public.host.meta_event_id = ? AND host.user_id = ?');
    $stmt->execute(array( $eventId, $userId));
    return $stmt->fetch();
}

function getHosts($eventId){
    global $conn;
    $stmt = $conn->prepare('SELECT public.authenticated_user.username, public.authenticated_user.photo_url FROM public.authenticated_user
                            INNER JOIN public.host ON public.host.user_id = public.authenticated_user.user_id
                            WHERE public.host.meta_event_id = ?');
    $stmt->execute(array($eventId));
    return $stmt->fetchAll();
}

function isGuest($userId, $eventId){
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.guest WHERE public.guest.event_id = ? AND public.guest.user_id = ?');
    $stmt->execute(array( $eventId, $userId));
    return $stmt->fetch();
}

function addGuest($userId, $eventId){
    global $conn;
    $isGoing = 0;
    $stmt = $conn->prepare('INSERT INTO public.guest(is_going, user_id, event_id) VALUES (?, ?, ?)');
    $stmt->execute(array($isGoing, $userId, $eventId));
}

function getGuests($eventId){
    global $conn;
    $stmt = $conn->prepare('SELECT public.authenticated_user.username, public.authenticated_user.photo_url FROM public.authenticated_user
                            INNER JOIN public.guest ON public.guest.user_id = public.authenticated_user.user_id
                            WHERE public.guest.event_id = ?');
    $stmt->execute(array($eventId));
    return $stmt->fetchAll();
}

?>