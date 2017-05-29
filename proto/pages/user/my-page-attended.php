<?php
include('../../config/init.php');
include('../../database/event.php');
include('../../database/user.php');

if (!isset($_SESSION['username'])){
    header('Location: ../../index.php');
    exit();
}

$id = getUserIdFromAuthenticatedUser($_SESSION['username']);
$events = getPastEvents($id);


foreach ($events as $key => $event){

    unset($date);
    unset($location);
    unset($name);
    unset($id);

    $date = date('l, jS \of F Y \a\t h:i A', strtotime($event[beginning_date]));

    $dateTime = new DateTime();

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
$smarty->assign('page_title','Events that I attended');

$smarty->display('event/list-events.tpl');
?>