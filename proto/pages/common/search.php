<?php 
include_once('../../config/init.php');

$serch = strip_tags($_GET['serched']);

$smarty->assign('serch', $serch);
$smarty->assign('events', $events); 
$smarty->assign('users', $users);
$smarty->assign('types', $types);

$smarty->display('common/serch.tpl');

?>