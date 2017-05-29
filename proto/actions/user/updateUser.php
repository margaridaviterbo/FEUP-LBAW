<?php

include_once('../../config/init.php');
include_once('../../database/user.php');

$firstname = $_POST["first_name"];
$lastname = $_POST["last_name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$nif = $_POST["nif"];
$user = getUserByEmail($email);

updateUser($firstname, $lastname, $email, $nif, $_SESSION['user_id']);
updateAuthenticatedUser($username, $password, $_SESSION['user_id']);

header('Location: ../../pages/user/my-page-my-information.php');

?>