<?php

include_once('../../config/init.php');
include_once('../../database/event.php');
include_once('../../database/localization.php');

$rate = $_POST["rating"];
$id = $_POST['id'];

if(!isset($_SESSION['username']))
    exit();

$evt = getMetaEvent($id);


echo $_POST["local"];


$evt["name"] = $_POST["name"];
$evt["beginning_date"] = $_POST["data"];
$evt["description"] = $_POST["description"];
$evt["free"] = ($_POST["cost"]=="free"? 1 : 0);



updateMetaEvent($id, $evt, $_POST["price"]);






//$evt.name = $_POST['name'];
//$evt.date = $_POST['data'];

//local

//$evt.description = $_POST['data'];

//$evt.free



echo '<script> window.location.href = "../../pages/event/show-event-page.php?id=',$id,'"; </script>';

?>