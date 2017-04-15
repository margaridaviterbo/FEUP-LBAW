<?php

    include_once('../../config/init.php');
    include_once('../../database/user.php');

    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $bool = authenticatedUserExists($username, $email);

    if ($bool){
        echo '<script> alert("User already exists.") </script>';
        header('refresh:2; url=pages/register.php');
    }
    else{

        $stmt = $conn->prepare('INSERT INTO users(first_name, last_name, email) VALUES (?, ?, ?)');

        $stmt->execute(array($firstname, $lastname, $email));

        $user_id = getUserIdFromUser($email);

        $stmt = $conn->prepare('INSERT INTO authenticated_user(user_id, username, password, user_state) VALUES (?, ?, ?, ?)');

        $stmt->execute(array($user_id, $username, $password, 'active'));

        echo '<script> alert("New user added. Check your email.") </script>';
    }

?>