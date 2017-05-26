<?php
include('../../config/init.php');
include('../../database/user.php');
include('../../database/event.php');

$userid = $_SESSION['user_id'];
$user = getUserFromId($userid);

$smarty->assign('NAME', $user['last_name'].", ".$user['first_name']);
$smarty->assign('EMAIL', $user['email']);
$smarty->assign('NIF', $user['nif']);

$id = $_GET['id'];
$event = getMetaEvent($id);
$smarty->assign('EVENT', $event['name']);
$smarty->assign('event_id', $id);

$tickettype = getTypeTicket($id);
$smarty->assign('PRICE', $tickettype['price']);

$smarty->display('ticket/checkout-payment.tpl');
?>