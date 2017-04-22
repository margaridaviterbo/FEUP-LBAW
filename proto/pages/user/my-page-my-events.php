<?php
include('../../config/init.php');
include('../../database/event.php');

if (!isset($_SESSION['username'])){
    header('Location: ../../index.php');
    exit();
}

$events = getEventsCreatedByUser($_SESSION['username']);

foreach ($events as $key => $event){

    unset($month);
    unset($time);
    unset($day);
    unset($year);

    $parsed_date = date_parse($event['beginning_date']);

    $monthNum = $parsed_date["month"];
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $month = $dateObj->format('F');

    $minute = $parsed_date["minute"];

    if (strlen($minute) == 1){
        $minute = "0" . $parsed_date["minute"];
    }

    $time = $parsed_date["hour"].":" . $minute;

    //$event[$key]['month'] = $month; //TODO: not working

    $smarty->assign('month', $month);
    $smarty->assign('day', $parsed_date["day"]);
    $smarty->assign('year', $parsed_date["year"]);
    $smarty->assign('time', $time);
}
$smarty->assign('events', $events);

$smarty->display('event/list-events.tpl');

?>