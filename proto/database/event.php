<?php
    //FALTA: user que fez comentário; id do evento
    function insertComment($user, $eventid, $comment, $url){
        global $conn;
        $stmt = $conn->prepare('INSERT INTO public.users(content, photo_url,comment_date) VALUES (?, ?, NOW())');
        $stmt->execute(array($comment, $lastname, $email));
    }

?>


