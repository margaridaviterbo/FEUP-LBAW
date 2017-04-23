<?php
include('../../config/init.php');

if (!isset($_SESSION['username'])){
    header('Location: ../../index.php');
    exit();
}

$smarty->display('user/user-homepage.tpl');
?>