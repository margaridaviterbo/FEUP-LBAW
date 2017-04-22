<?php
include('../../config/init.php');
include('../../database/event.php');

if(isset($_POST['comment']) && isset($_POST['photo'])) {
    $user_id; //como obter?
    $event_id; //falta obter
    insertComment($user_id, $event_id, $_POST['comment'], 
        $_POST['photo']);
    //TODO: criar mensagem de alerta
}

$smarty->display('event/show-event-page.tpl');
?>
