<?php

include_once('../../config/init.php');
include_once('../../database/user.php');

$emailUsername = $_POST["email-login"];
$password = $_POST["password-login"];


$user = getUserByEmail($emailUsername);

//Se o mail não existir, procura o username
if ($user == false) {

    $user = getAuthenticatedUserByUsername($emailUsername);

    if ($user != false) {
        $username = $emailUsername;
        $user_id = getUserIdFromAuthenticatedUser($username);
    }

} else {
    $username = getUsernameOfUser($email);
    $user_id = getUserIdFromUser($email);
}

if (isLoginCorrect($username, $password)) {

    $_SESSION['authenticated'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user_id;

    header('refresh:1; url=../../pages/user/user-homepage.php');
}
else {

    echo '<script> alert("User doesn\'t exist.") </script>';
    header('refresh:1; url=../../index.php');

}

?>