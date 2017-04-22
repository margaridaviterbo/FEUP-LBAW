<?php
    //FALTA: user que fez comentário; id do evento
    function insertComment($user, $eventid, $comment, $url){
        global $conn;
        $stmt = $conn->prepare('INSERT INTO public.users(content, photo_url,comment_date) VALUES (?, ?, NOW())');
        $stmt->execute(array($comment, $lastname, $email));
    }

function createMetaEvent($name, $description, $recurrence, $photo, $expiration_date, $expiration_time, $free, $public, $owner, $category, $local){
    global $conn;
    $state = 0;
    $date = date('Y-m-d H:i:s', strtotime("$expiration_date $expiration_time"));

    $stmt = $conn->prepare('INSERT INTO public.meta_event(name, description, recurrence, meta_event_state, photo_url, expiration_date, free, public, owner_id, category_id, local_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $description, $recurrence, $state, $photo, $date, $free, $public, $owner, $category, $local));
}

function createEvent($name, $description, $beginning_date, $beginning_time, $ending_date, $ending_time, $photo, $free, $public, $meta_event_id, $local){
    global $conn;
    $state = 0;
    $beginning = date('Y-m-d H:i:s', strtotime("$beginning_date $beginning_time"));
    $ending = date('Y-m-d H:i:s', strtotime("$ending_date $ending_time"));

    $stmt = $conn->prepare('INSERT INTO public.event(name, description, beginning_date, ending_date, event_state, photo_url, free, public, meta_event_id, local_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $description, $beginning, $ending, $state, $photo, $free, $public, $meta_event_id, $local));
}

function getEventsCreatedByUser($username){
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.event 
                            INNER JOIN public.meta_event ON public.event.meta_event_id = public.meta_event.meta_event_id
                            INNER JOIN public.authenticated_user ON public.meta_event.owner_id = public.authenticated_user.user_id
                            WHERE public.authenticated_user.username = ?');
    $stmt->execute(array($username));
    return $stmt->fetchAll();
}

?>