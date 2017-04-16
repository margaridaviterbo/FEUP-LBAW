<?php

include_once('../../config/init.php');
include_once('../../database/user.php');

$emailUsername = $_POST["email-login"];
$password = $_POST["password-login"];

$bool = authenticatedUserExists($username, $email);

if ($bool === false){

    echo '<script> alert("User doesn\'t exist.") </script>';
    header('refresh:1; url=../../pages/homepage.php');
}
else {

    $user = getUserByEmail($emailUsername);

    //Se o mail não existir, procura o username
    if ($user == null) {

        $user = getAuthenticatedUserByUsername($emailUsername);

    } else {
        //UpdateUser
    }

    $user_id = getUserIdFromUser($email);

    createAuthenticatedUser($user_id, $username, $password);

    //Login - pode existir algum erro na base de dados
    if (isLoginCorrect($username, $password)) {

        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user_id;

        //echo '<script> alert("New user added. Check your email.") </script>';
        echo '<script> alert("New user added.") </script>';
        header('refresh:1; url=../../pages/user/user-homepage.php');
    }
}

?>