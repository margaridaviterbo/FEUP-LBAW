<?php

include_once('../../config/init.php');
include_once('../../database/admin.php');

$emailUsername = $_POST["uname"];
$password = $_POST["psw"];

$admin = isLoginCorrect($emailUsername, $password);

if ($admin) {

    $_SESSION['authenticated'] = true;
    $_SESSION['username'] = $emailUsername;
	$_SESSION['user_id'] = -1;
    header('Location: ../../pages/admin/admin.php');
}
else {

    $_SESSION['error_messages'] = 'Incorrect password';
    header('Location: ../../pages/admin/admin-login.php');
    exit;
}

?>