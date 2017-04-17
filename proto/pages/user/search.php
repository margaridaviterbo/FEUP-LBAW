<?php 
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/user.php'); 
include_once($BASE_DIR . 'database/event.php');
include($HEADER_DIR);
include($MENU_USER_DIR);
include($ASSIDE_MENU_DIR);

$smarty->assign('events', $events); 
$smarty->assign('users', $users);
$smarty->assign('types', $types);

$smarty->display('user/serch.tpl');

include($FOTTER_DIR);
?>