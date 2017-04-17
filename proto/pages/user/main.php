<?php
	include_once('../../config/init.php');
    include_once($BASE_DIR . 'database/user.php'); 
	
	$users = getAllUsers(1);
	
	$smarty->assign('users', $users);
	
	$smarty->display('user/main.tpl');
?>
