<?php
include('../../config/init.php');
include('../../database/user.php');

if(isset($_GET['name'])) {
    $name = $_GET['name'];
    $res = searchByUsername($name);
}

$smarty->display('common/search.tpl');
?>