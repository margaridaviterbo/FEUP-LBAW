<?php
include('../../config/init.php');
include('../../database/user.php');

if (!isset($_SESSION['username'])){
    header('Location: ../../index.php');
    exit();
}

$id = getUserIdFromAuthenticatedUser($_SESSION['username']);
$authenticated = getAuthenticatedUserFromId($id);
$user = getUserFromId($id);

$smarty->assign('FIRSTNAME', $user['first_name']);
$smarty->assign('LASTNAME', $user['last_name']);
$smarty->assign('EMAIL', $user['email']);
$smarty->assign('NIF', $user['nif']);
$smarty->assign('PHOTOURL', $authenticated['photo_url']);
$smarty->assign('STATE', $authenticated['user_state']);

$smarty->display('user/my-page-my-information.tpl');
?>