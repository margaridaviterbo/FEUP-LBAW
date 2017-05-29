<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/event.php');
$eventId = $_POST['id'];
$typeId = $_POST['ticketType'];
$quantity = $_POST['quantity'];
$nameReg = $_POST['user'];
$nif = $_POST['nif'];
$email = $_POST['email'];

require '../../paypal/start.php';
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;

$ticket = getTicketInfo($typeId)[0];
$name = $ticket['ticket_type'];
$price = $ticket['price'];

$payer = new Payer();
$payer->setPaymentMethod('paypal');
$item = new Item();
$item->setName($name)
	->setCurrency('EUR')
	->setQuantity($quantity)
	->setPrice($price);
	
$itemList = new ItemList();
$itemList->setItems([$item]);

$details = new Details();
$details->setSubtotal($price*$quantity);

$amount = new Amount();
$amount->setCurrency('EUR')
	->setTotal($price*$quantity)
	->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
	->setItemList($itemList)
	->setDescription('A descicao aparece aqui!')
	->setInvoiceNumber(uniqid());
	
$nameReg = str_replace(' ', '-', $nameReg);
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl($BASE_URL . 'actions/event/pay.php?eventId='.$eventId.'&typeId='.$typeId.'&quantity='.$quantity.'&nameReg='.$nameReg.'&nif='.$nif.'&email='.$email)
	->setCancelUrl($_SERVER['HTTP_REFERER']);
	
$payment = new Payment();
$payment->setIntent('sale')
	->setPayer($payer)
	->setRedirectUrls($redirectUrls)
	->setTransactions([$transaction]);
	
try {
	$payment->create($paypal);
}catch(Exception $e) {
	die($e);
}

$approvalUrl = $payment->getApprovalLink();
header('Location: ' . $approvalUrl);
//if($v[0]["res"] !=1)
//    buy_ticket($userid, $id);


//header("Location: " . "../../pages/ticket/confirmation-payment.php");

?>