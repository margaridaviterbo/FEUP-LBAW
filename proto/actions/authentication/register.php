<?php

    include_once('../../config/init.php');
    include_once('../../database/user.php');

    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $bool = authenticatedUserExists($username, $email);

    if ($bool === true){

        echo '<script> alert("User already exists.") </script>';
        header('refresh:1; url=../../pages/common/homepage.php');
    }
    else {

        $user = getUserByEmail($email);

        //Se o utilizador ainda não existir na base de dados
        if ($user == false) {
            createUser($firstname, $lastname, $email);
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