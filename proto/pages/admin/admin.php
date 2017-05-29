<?php

include('../../config/init.php');
include_once('../../database/admin.php');

$adminId = getAdminId($_SESSION['username'])['administrator_id'];
$notifications = getNotifications($adminId);

$smarty->assign('notifications', $notifications);

$smarty->display('admin/admin.tpl');

?>
