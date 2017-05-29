<?php
include('../../config/init.php');
include($BASE_DIR . 'database/user.php');

if (!isset($_SESSION['username'])){
    header('Location: ../../index.php');
    exit();
}
$user = getAuthenticatedUserByUsername($_SESSION['username'])['user_id'];
$notifications = getNotifications($user);
$smarty->assign('NOTIFICATIONS', $notifications);
$smarty->assign('BASE_URL', $BASE_URL);
$smarty->display('user/my-page-notifications.tpl');
?>