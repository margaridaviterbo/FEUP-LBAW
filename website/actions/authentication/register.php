<?php

    include_once('../../config/init.php');
    include_once('../../database/user.php');

    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nif = $_POST["nif"];

    $bool = authenticatedUserExists($username, $email);

    if ($bool === true){

        $_SESSION['error_messages'] = 'User already exists';
        header('Location: {$BASE_URL}pages/common/error.php');
        exit;
    }
    else {

        $user = getUserByEmail($email);

        //Se o utilizador ainda não existir na base de dados
        if ($user == false) {
            createUser($firstname, $lastname, $email, $nif);
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

            header('Location: ../../pages/user/user-homepage.php');
        }
        else{
            $_SESSION['error_messages'] = 'Login Failed';
            header('Location: {$BASE_URL}pages/common/error.php');
            exit;
        }
    }

?>