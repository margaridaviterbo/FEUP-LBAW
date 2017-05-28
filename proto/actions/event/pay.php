<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'paypal/pdf/mpdf.php');
~include_once($BASE_DIR . 'database/event.php');
~include_once($BASE_DIR . 'database/user.php');
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

$username = $_SESSION['username'];
$eventId = $_GET['eventId'];
$typeId = $_GET['typeId'];
$quantity = $_GET['quantity'];
$nameReg = $_GET['nameReg'];
$email = $_GET['email'];
$nif = $_GET['nif'];
$nameReg = str_replace('-', ' ', $nameReg);

require '../../paypal/start.php';

$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

$payment = Payment::get($paymentId, $paypal);

$execute = new PaymentExecution();
$execute->setPayerId($payerId);

try{
	$result = $payment->execute($execute, $paypal);
} catch(Exception $e) {
	$data = json_decode($e->getData());
	var_dump($data);
	header('Location: ' . SITE_URL . 'pages/ticket/checkout-payment.php');
}
$ticket = getTicketInfo($typeId)[0];
$typeNameTicket = $ticket['ticket_type'];
$price = $ticket['price'];

$userid = getByUsername($username);
$lastaded = buy_ticket($userid[0]['user_id'], $typeId)['max'];
$name = getEventName($eventId)['name'];
$page = '<html>
		<body>
			<h1 color="blue">Invoice</h1>
			<p>Thank you for choosing EVENIFY. Here are your information about your purchase:</p>
			<ul>
				<li>Nome: '.$nameReg.'</li>
				<li>Email: '.$email.'</li>
				<li>NIF: '.$nif.'</li>
				<li>Event: '.$name.'</li>
				<li>Type of Ticket: '.$typeNameTicket.'</li>
				<li>Quantity: '.$quantity.'</li>
				<li>Price per ticket: '.$price.'</li>
				<li>Total: '.($price*$quantity).'</li>
			</ul>
			<p>Id:'. $lastaded .'</p>
		</body>
	</html>';

$pdfname = $lastaded . '.pdf';
$mpdf = new mPdf();
$mpdf->WriteHTML($page);
$mpdf->Output('../../database/pdf/' . $pdfname, 'F');
header('Location: ' . $BASE_URL . 'pages/ticket/confirmation-payment.php?id='.$lastaded.'&eventId='.$eventId);

?>