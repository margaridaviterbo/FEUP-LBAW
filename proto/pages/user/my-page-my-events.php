<?php
include('../../config/init.php');
include('../../database/event.php');

if (!isset($_SESSION['username'])){
    header('Location: ../../index.php');
    exit();
}

$events = getEventsCreatedByUser($_SESSION['username']);

foreach ($events as $key => $event){

    unset($date);
    unset($location);
    unset($name);

    $date = date('l, jS \of F Y \a\t h:i A', strtotime($event[beginning_date]));

    $location = $event[city] . ", " . $event[country];

    $name = $event[name];

    $events[$key]['date'] = $date;
    $events[$key]['location'] = $location;
    $events[$key]['name'] = $name;
}

$smarty->assign('events', $events);

$smarty->display('event/list-events.tpl');

?>