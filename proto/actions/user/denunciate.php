<?php
include('../../config/init.php');
include_once('../../database/admin.php');

$user = $_POST["user"];

addNotificatioinUser(1, $user);

header('Location:'.$_SERVER['HTTP_REFERER']);
?>