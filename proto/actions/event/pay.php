<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'paypal/pdf/mpdf.php');
include_once($BASE_DIR . 'database/event.php');
include_once($BASE_DIR . 'database/user.php');
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
try{
	$lastaded = buy_ticket($userid[0]['user_id'], $typeId)['max'];
} catch (Exception $e){
	$lastaded = rand( 1000 , 10000 );
}
$name = getEventName($eventId)['name'];
	
$page = '<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>
    <style>
        *
        {
            margin:0;
            padding:0;
            font-family:Arial;
            font-size:10pt;
            color:#000;
        }
        body
        {
            width:100%;
            font-family:Arial;
            font-size:10pt;
            margin:0;
            padding:0;
        }
         
        p
        {
            margin:0;
            padding:0;
        }
         
        #wrapper
        {
            width:180mm;
            margin:0 15mm;
        }
         
        .page
        {
            height:294mm;
            width:210mm;
        }
 
        table
        {
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            border-spacing:0;
            border-collapse: collapse; 
             
        }
         
        table td 
        {
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 2mm;
        }
         
        table.heading
        {
            height:50mm;
        }
         
        h1.heading
        {
            font-size:14pt;
            color:#000;
            font-weight:normal;
        }
         
        h2.heading
        {
            font-size:9pt;
            color:#000;
            font-weight:normal;
        }
         
        hr
        {
            color:#ccc;
            background:#ccc;
        }
         
        #invoice_body
        {
            height: 110mm;
        }
         
        #invoice_body , #invoice_total
        {   
            width:100%;
        }
        #invoice_body table , #invoice_total table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
     
            border-spacing:0;
            border-collapse: collapse; 
             
            margin-top:5mm;
        }
         
        #invoice_body table td , #invoice_total table td
        {
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding:2mm 0;
        }
         
        #invoice_body table td.mono  , #invoice_total table td.mono
        {
            font-family:monospace;
            text-align:right;
            padding-right:3mm;
            font-size:10pt;
        }
         
        #footer
        {   
            width:180mm;
            margin:0 15mm;
            padding-bottom:3mm;
        }
        #footer table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            background:#eee;
             
            border-spacing:0;
            border-collapse: collapse; 
        }
        #footer table td
        {
            width:25%;
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
<div id="wrapper">
     
    <p style="text-align:center; font-weight:bold; padding-top:5mm;">INVOICE</p>
    <br />
    <table class="heading" style="width:100%;">
        <tr>
            <td style="width:80mm;">
                <h1 class="heading">EVENTIFY</h1>
                <h2 class="heading">
                    R. Dr. Roberto Frias<br />
                    4200-465 Porto<br />
                    fe.up.pt<br />
                     
                    Website : gnomo.fe.up.pt/~lbaw1622/final<br />
                    E-mail : lbaw1622@fe.up.pt<br />
                    Phone : +351 22 041 3508
                </h2>
            </td>
            <td rowspan="2" valign="top" align="right" style="padding:3mm;">
                <table>
                    <tr><td>Invoice No : </td><td>'.$lastaded.'</td></tr>
                    <tr><td>Dated : </td><td>'.date("d/m/Y").'</td></tr>
                    <tr><td>Currency : </td><td>EUR</td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <b>Buyer</b> :<br />
                '.$nameReg.'<br />
            '.$email.'
                <br />
                NIF:'.$nif.'<br />
            </td>
        </tr>
    </table>
         
         
    <div id="content">
         
        <div id="invoice_body">
            <table>
            <tr style="background:#eee;">
                <td style="width:8%;"><b>Sl. No.</b></td>
                <td><b>Product</b></td>
                <td style="width:15%;"><b>Quantity</b></td>
                <td style="width:15%;"><b>Price per ticket</b></td>
                <td style="width:15%;"><b>Total</b></td>
            </tr>
            </table>
             
            <table>
            <tr>
                <td style="width:8%;">1</td>
                <td style="text-align:left; padding-left:10px;">Event: '.$name.'<br />Type of Ticket: '.$typeNameTicket.'</td>
                <td class="mono" style="width:15%;">'.$quantity.'</td><td style="width:15%;" class="mono">'.$price.'</td>
                <td style="width:15%;" class="mono">'.($price*$quantity).'</td>
            </tr>
             
            <tr>
                <td colspan="3"></td>
                <td>Total :</td>
                <td class="mono">'.($price*$quantity).'</td>
            </tr>
        </table>
		<img src="'.$BASE_URL.'paypal/qrcode/php/qr_img.php?d=EVENTIFY-'.$lastaded.'">
        </div>
		
        <div id="invoice_total">
            Total Amount :
            <table>
                <tr>
                    <td style="text-align:left; padding-left:10px;"></td>
                    <td style="width:15%;">EUR</td>
                    <td style="width:15%;" class="mono">'.($price*$quantity).'</td>
                </tr>
            </table>
        </div>
        <br />
        <hr />
        <table style="width:100%; height:35mm;">
            <tr>
                <td style="width:65%;" valign="top">
                    Payment Information :<br />
                    Please make cheque payments payable to : <br />
                    <b>EVENTIFY</b>
                    <br /><br />
                    The Invoice is payable within 7 days of issue.<br /><br />
                </td>
                <td>
                <div id="box">
                    FEUP<br />
                    For EVENTIFY Corp<br /><br /><br /><br />
                    Authorised Signatory
                </div>
                </td>
            </tr>
        </table>
    </div>
     
    <br />
     
    </div>
     
    <htmlpagefooter name="footer">
        <hr />
        <div id="footer"> 
            <table>
                <tr><td>Software Solutions</td><td>Mobile Solutions</td><td>Web Solutions</td></tr>
            </table>
        </div>
    </htmlpagefooter>
    <sethtmlpagefooter name="footer" value="on" />
     
</body>
</html>';
	
$pdfname = $lastaded . '.pdf';
$mpdf = new mPdf();
$mpdf->WriteHTML($page);
$mpdf->Output('../../database/pdf/' . $pdfname, 'F');
header('Location: ' . $BASE_URL . 'pages/ticket/confirmation-payment.php?id='.$lastaded.'&eventId='.$eventId);

?>