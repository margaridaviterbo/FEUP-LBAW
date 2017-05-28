<?php
include_once('../../config/init.php');

$id = $_GET['id'];
$idEvent = $_GET['eventId'];

$smarty->assign('BASE_URL', $BASE_URL);
$smarty->assign('ID', $id);
$smarty->assign('IDEVENT', $idEvent);

$smarty->display('ticket/confirmation-payment.tpl');
?>