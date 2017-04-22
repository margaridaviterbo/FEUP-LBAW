<?php
include('../../config/init.php');
include('../../database/event.php');

if (!isset($_SESSION['username'])){
    header('Location: ../../index.php');
    exit();
}

$events = getEventsCreatedByUser($_SESSION['username']);

$smarty->display('common/header.tpl');

foreach ($events as $event){

    unset($date);
    unset($time);

    $teste = $event['beginning_date'];
    //$date = getdate($event['beginning_date']);
    $date = date('Y-m-d H:i:s', $teste);

    var_dump($teste);
    var_dump($date);

    $event['date'] = $date;
    $event['time'] = $time;
}
$smarty->assign('events', $events);

$smarty->display('event/show-all-events.tpl');
$smarty->display('common/footer.tpl');

?>