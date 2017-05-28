<?php
include_once('../../config/init.php');
include('../../database/user.php');
include('../../database/event.php');

$userid = $_SESSION['user_id'];
$user = getUserFromId($userid);
$smarty->assign('NAME', $user['first_name'] . " " . $user['last_name']);
$smarty->assign('EMAIL', $user['email']);
$smarty->assign('NIF', $user['nif']);

$id = $_GET['id'];
$event = getEventName($id);
$smarty->assign('EVENT', $event['name']);
$smarty->assign('event_id', $id);

$tickets = getMetaEventTickets($id);
$smarty->assign('TICKETS', $tickets);

$tickettype = getTypeTicket($id);

$smarty->display('ticket/checkout-payment.tpl');
?>