<?php 
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/user.php'); 
include_once($BASE_DIR . 'database/event.php');

$serch = $_GET['serched'];

$events = getSearchEvents(0, $serch, true, true, true, 'ASC');
$users = getSearchUsers(0, $serch, 'ASC');

$smarty->assign('serched', $serched)
$smarty->assign('events', $events); 
$smarty->assign('users', $users);
$smarty->assign('types', $types);

$smarty->display('user/serch.tpl');

?>