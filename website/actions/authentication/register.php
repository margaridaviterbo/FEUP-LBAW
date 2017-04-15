<?php

    include_once('../../config/init.php');
    include_once('../../database/user.php');

    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    var_dump($email);

    $bool = authenticatedUserExists($username, $email);

    if ($bool){
        echo '<script> alert("User already exists.") </script>';
        header('refresh:2; url=../../pages/register.php');
    }
    else{

        $user = getUserByEmail($email);

        //Se o utilizador ainda não existir na base de dados
        if ($user == false) {

            createUser($firstname, $lastname, $email);
        }

        $user_id = getUserIdFromUser($email);

        createAuthenticatedUser($user_id, $username, $password);

        echo '<script> alert("New user added. Check your email.") </script>';
        header('refresh:2; url=../../pages/user-homepage.php');
    }

?>