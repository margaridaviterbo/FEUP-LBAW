<?php
include('../../config/init.php');
include('../../database/event.php');

$meta_event_id = $_GET['id'];

$num_tickets = numTickets($meta_event_id);
$event = getMetaEvent($meta_event_id);

$date = date('l, jS \of F Y \a\t h:i A', strtotime($event[beginning_date]));
$month = date('M', strtotime($event[beginning_date]));
$day = date('d', strtotime($event[beginning_date]));

$ending = date('l, jS \of F Y \a\t h:i A', strtotime($event[ending_date]));
$ending_small_format = date('m/d/Y H:i', strtotime($event[ending_date]));

$rate = getRating($meta_event_id)[0]["avg"];

$comments = getComments($meta_event_id);

$smarty->assign('comments', $comments);

$smarty->assign('rate', $rate);
$smarty->assign('event_id', $meta_event_id);
$smarty->assign('event', $event);
$smarty->assign('date', $date);
$smarty->assign('day', $day);
$smarty->assign('month', $month);
$smarty->assign('tickets', $num_tickets['num_tickets']);

$smarty->display('event/show-event-page.tpl');
?>
