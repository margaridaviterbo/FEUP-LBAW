<?php
include('../../config/init.php');
include('../../database/event.php');
include('../../database/user.php');
include('../../database/host.php');

$meta_event_id = $_GET['id'];

$num_tickets = numTickets($meta_event_id);
$event = getMetaEvent($meta_event_id);

$date = date('l, jS \of F Y \a\t h:i A', strtotime($event[beginning_date]));
$month = date('M', strtotime($event[beginning_date]));
$day = date('d', strtotime($event[beginning_date]));

$ending = date('l, jS \of F Y \a\t h:i A', strtotime($event[ending_date]));
$ending_small_format = date('m/d/Y H:i', strtotime($event[ending_date]));

$rate = getRating($meta_event_id)[0]["avg"];

$comments = getComments($meta_event_id);

$hosts = getHosts($meta_event_id);
$guests = getGuests($meta_event_id);
$going = false;
$isGuest = false;

if(!$event['public']){
	$canSee=false;
	foreach($hosts as $host){
		if($host['username'] == $_SESSION['username']){
			$canSee=true;
		}
	}
	if($canSee==false){
		foreach($guests as $guest){
			if($guest['username'] == $_SESSION['username']){
				$canSee=true;
			}
		}
	}
	if($canSee==false){
		header('Location: ' . $BASE_URL);
	}
}

foreach($guests as $guest){
	if($guest['username'] == $_SESSION['username']){
		$isGuest=true;
	}
}
$au_user_id =0;
try{
	$au_user_id = getUserIdFromAuthenticatedUser($_SESSION['username']);
	$going = responseGetResponse($meta_event_id, $au_user_id)['is_going'];
} catch(Exception $e){
}


$smarty->assign('comments', $comments);
$smarty->assign('hosts', $hosts);
$smarty->assign('guests', $guests);

$smarty->assign('rate', $rate);
$smarty->assign('event_id', $meta_event_id);
$smarty->assign('event', $event);
$smarty->assign('date', $date);
$smarty->assign('day', $day);
$smarty->assign('month', $month);
$smarty->assign('isGuest', $isGuest);
$smarty->assign('going', $going);
$smarty->assign('au_user_id', $au_user_id);
$smarty->assign('tickets', $num_tickets['num_tickets']);

$smarty->display('event/show-event-page.tpl');
?>
