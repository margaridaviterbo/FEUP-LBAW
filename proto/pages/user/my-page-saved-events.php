<?php
include('../../config/init.php');
include('../../database/event.php');
include('../../database/user.php');

if (!isset($_SESSION['username'])){
    header('Location: ../../index.php');
    exit();
}

$id = getUserIdFromAuthenticatedUser($_SESSION['username']);
$events = getSavedEvents($id);

$smarty->assign('events', $events);
$smarty->assign('page_title','Saved events');

$smarty->display('user/user-homepage.tpl');
?>