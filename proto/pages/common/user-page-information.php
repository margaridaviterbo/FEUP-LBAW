<?php
include('../../config/init.php');
include('../../database/user.php');

$id = $_GET['id'];

$user = getTotalUsersFromId($id);

$smarty->assign('USERNAMER', $user['username']);
$smarty->assign('ID', $user['user_id']);
$smarty->assign('FIRSTNAME', $user['first_name']);
$smarty->assign('LASTNAME', $user['last_name']);
$smarty->assign('EMAIL', $user['email']);
$smarty->assign('NIF', $user['nif']);
$smarty->assign('PHOTOURL', $authenticated['photo_url']);
$smarty->assign('STATE', $authenticated['user_state']);

$smarty->display('common/user-page-information.tpl');
?>