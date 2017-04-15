<?php

    function authenticatedUserExists($username, $email){

        $r_email = getAuthenticatedUserByEmail($email);
        $r_username = getAuthenticatedUserByUsername($username);

        var_dump($r_username);
        var_dump($r_email);

        if ($r_email == NULL && $r_username == NULL)
            return false;
        else
            return true;
    }

    function getAuthenticatedUserByUsername($username){

        global $conn;
        $stmt = $conn->prepare('SELECT * FROM authenticated_user WHERE authenticated_user.username = ?');
        $stmt->execute(array($username));
        return $stmt->fetch();
    }

    function getUserByEmail($email){

        global $conn;
        $stmt = $conn->prepare('SELECT * FROM users WHERE users.email = ?');
        $stmt->execute(array($email));
        return $stmt->fetch();
    }

    function getAuthenticatedUserByEmail($email){

        global $conn;
        $stmt = $conn->prepare('SELECT * FROM users 
                                INNER JOIN authenticated_user 
                                ON users.user_id = authenticated_user.user_id 
                                WHERE users.email = ?');
        $stmt->execute(array($email));
        return $stmt->fetch();
    }

    function getUserIdFromUser($email){

        global $conn;
        $stmt = $conn->prepare('SELECT user_id FROM users WHERE users.email = ?');
        $stmt->execute(array($email));
        return intval($stmt->fetch());
    }

?>