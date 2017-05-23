<?php
include('../../config/init.php');
include('../../database/event.php');
/*
if(isset($_POST['comment']) && isset($_POST['photo'])) {
    $user_id; //como obter?
    $event_id; //falta obter
    insertComment($user_id, $event_id, $_POST['comment'], 
        $_POST['photo']);
    //TODO: criar mensagem de alerta
}
*/

$meta_event_id = $_GET['id'];

$num_tickets = numTickets($meta_event_id);
$event = getMetaEvent($meta_event_id);

$date = date('l, jS \of F Y \a\t h:i A', strtotime($event[beginning_date]));
$date_small_format = $date;

$ending = date('l, jS \of F Y \a\t h:i A', strtotime($event[ending_date]));
$ending_small_format = date('m/d/Y H:i', strtotime($event[ending_date]));
/*
if ($ending != null) {
    $date = $date . " - " . $ending;
}*/

$rate = getRating($meta_event_id)[0]["avg"];

$cmts = getComments($meta_event_id);

$smarty->assign('comments', $cmts);

$smarty->assign('rate', $rate);
$smarty->assign('event_id', $meta_event_id);
$smarty->assign('event', $event);
$smarty->assign('date', $date);
$smarty->assign('date_small_format', $date_small_format);
$smarty->assign('tickets', $num_tickets['num_tickets']);



//print_r(array_values($event));

$smarty->display('event/show-event-page.tpl');
?>
