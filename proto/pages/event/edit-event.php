<?php
include('../../config/init.php');
include('../../database/event.php');


$meta_event_id = $_GET['id'];

$event = getMetaEvent($meta_event_id);

$date = date('Y-m-d', strtotime($event[beginning_date]));
$date_small_format = $date;

$ending = date('l, jS \of F Y \a\t h:i A', strtotime($event[ending_date]));
$ending_small_format = date('m/d/Y H:i', strtotime($event[ending_date]));

$rate = getRating($meta_event_id)[0]["avg"];

$cmts = getComments($meta_event_id);

$smarty->assign('comments', $cmts);

$smarty->assign('event_id', $meta_event_id);
$smarty->assign('event', $event);
$smarty->assign('date', $date);
$smarty->assign('date_small_format', $date_small_format);

$ticketType = getTypeTicket($meta_event_id);
$smarty->assign('price', $ticketType['price']);


//print_r(array_values($event));



$smarty->display('event/edit-event.tpl');
?>