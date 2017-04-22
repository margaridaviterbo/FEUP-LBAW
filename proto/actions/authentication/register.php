<?php

    include_once('../../config/init.php');
    include_once('../../database/user.php');

    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nif = $_POST["nif"];

    if (getAuthenticatedUserByEmail($email) != NULL){
        $_SESSION['error_messages'] = 'Email already exists';
        header('Location: ../../pages/common/error.php');
        exit;
    }
    else if(getAuthenticatedUserByUsername($username) != NULL){
        $_SESSION['error_messages'] = 'Username already exists';
        header('Location: ../../pages/common/error.php');
        exit;
    }
    else if(checkIfNifExists($nif) != NULL){
        $_SESSION['error_messages'] = 'Nif already registered';
        header('Location: ../../pages/common/error.php');
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
            header('Location: ../../pages/common/error.php');
            exit;
        }
    }

?>