<?php
include('../../config/init.php');
include('../../database/event.php');

if (!isset($_SESSION['username'])){
    header('Location: ../../index.php');
    exit();
}

$events = listEvents();
$smarty->assign('events', $events);
$smarty->assign('page_title','Upcoming events');
$smarty->display('user/user-homepage.tpl');
?>