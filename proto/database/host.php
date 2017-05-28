<?php

function addHost($userId, $eventId){
    global $conn;
    $stmt = $conn->prepare('INSERT INTO public.host(user_id, meta_event_id) VALUES (?, ?)');
    $stmt->execute(array($userId, $eventId));
}

function getHosts($eventId){
    global $conn;
    $stmt = $conn->prepare('SELECT authenticated_user.username, authenticated_user.photo_url FROM public.authenticated_user
                            INNER JOIN public.host ON public.host.user_id = public.authenticated_user.user_id
                            WHERE public.host.meta_event_id = ?');
    $stmt->execute(array($eventId));
    return $stmt->fetchAll();
}
?>