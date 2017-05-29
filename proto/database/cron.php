<?php

function updatePastEvents()
{
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.meta_event WHERE public.meta_event.meta_event_state = 0 AND public.meta_event.beginning_date < ?');
    $stmt->execute(array(new DateTime()));
    return $stmt->fetch();
}

?>