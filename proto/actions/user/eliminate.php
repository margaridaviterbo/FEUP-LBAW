<?php
include('../../config/init.php');
include_once('../../database/admin.php');

$user = $_POST["user"];

delete_user(1);

header('Location:'.$_SERVER['HTTP_REFERER']);
?>