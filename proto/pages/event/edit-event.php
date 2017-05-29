<?php
include('../../config/init.php');
include('../../database/event.php');


$meta_event_id = $_GET['id'];

$event = getMetaEvent($meta_event_id);
$smarty->assign('event', $event);

$beginning_date = date('Y-m-d', strtotime($event[beginning_date]));
$beginning_time = date('H:i', strtotime($event[beginning_date]));
$smarty->assign('beg_date', $beginning_date);
$smarty->assign('beg_time', $beginning_time);
$smarty->assign('eventId', $meta_event_id);

if($event[ending_date] != null) {
    $ending_date = date('Y-m-d', strtotime($event[ending_date]));
    $ending_time = date('H:i', strtotime($event[ending_date]));
    $smarty->assign('end_date', $ending_date);
    $smarty->assign('end_time', $ending_time);
}

$smarty->display('event/edit-event.tpl');
?>