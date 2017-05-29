<?php
include('../../config/init.php');
include('../../database/event.php');

if (!isset($_SESSION['username'])){
    header('Location: ../../index.php');
    exit();
}

$page;

$events = getEventsCreatedByUser($_SESSION['username'], $page);

foreach ($events as $key => $event){

    unset($date);
    unset($location);
    unset($name);
    unset($id);

    $date = date('l, jS \of F Y \a\t h:i A', strtotime($event[beginning_date]));

    $current = date('m/d/Y h:i:s a', time());

    if ($event[beginning_date]<$current){
        $smarty->assign('pastEvent', true);
    }
    else{
        $smarty->assign('pastEvent', false);
    }

    $dateTime = new DateTime();
    //var_dump($dateTime);
    //var_dump($date);
    if ($date > $dateTime) {
        $events[$key]['pastEvent'] = true;
    }

    $location = $event[city] . ", " . $event[country];

    $name = $event[name];

    $id = $event[id];

    $events[$key]['date'] = $date;
    $events[$key]['location'] = $location;
    $events[$key]['name'] = $name;
    $events[$key]['event_id'] = $id;
}

$smarty->assign('events', $events);
$smarty->assign('page_title', 'Events that I\'ve created');

$smarty->display('event/list-events.tpl');

?>