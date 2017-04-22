<?php 
include_once('../../config/init.php');
include_once($BASE_DIR . 'api/serch/user.php'); 
include_once($BASE_DIR . 'api/serch/event.php');

$serch = strip_tags($_GET['serched']);

$smarty->assign('serch', $serch);
$smarty->assign('events', $events); 
$smarty->assign('users', $users);
$smarty->assign('types', $types);

$smarty->display('user/serch.tpl');

?>