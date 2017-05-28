<?php
include('../../config/init.php');
include('../../database/user.php');

if (!isset($_SESSION['username'])){
    header('Location: ../../index.php');
    exit();
}
$userid = getAuthenticatedUserByUsername($_SESSION['username'])['user_id'];
$tickets = getUserTickets($userid);
$smarty->assign('TICKETS', $tickets);
$smarty->assign('BASE_URL', $BASE_URL);
$smarty->display('user/my-tickets.tpl');
?>