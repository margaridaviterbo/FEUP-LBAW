<?php

include_once('../../config/init.php');
include_once('../../database/user.php');

$firstname = $_POST["first_name"];
$lastname = $_POST["last_name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$nif = $_POST["nif"];
$photo = $_POST["photo_url"];
$user = getUserByEmail($email);

$uploaddir = '../../resources/images/users/';
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);

if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
    $photo = $uploadfile;
} else {
    $photo = '../../resources/images/users/user.png';
}

updateUser($firstname, $lastname, $email, $nif, $_SESSION['user_id']);
updateAuthenticatedUser($username, $password, $_SESSION['user_id'], $photo);

header('Location: ../../pages/user/my-page-my-information.php');

?>