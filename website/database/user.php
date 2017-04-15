<?php

    function authenticatedUserExists($username, $email){

        $r_email = getAuthenticatedUserByEmail($email);
        $r_username = getAuthenticatedUserByUsername($username);

        if ($r_email == NULL && $r_username == NULL)
            return false;
        else
            return true;
    }

    function getAuthenticatedUserByUsername($username){

        global $conn;
        $stmt = $conn->prepare('SELECT * FROM users WHERE authenticated_user.username = ? COLLATE NOCASE');
        return $stmt->fetch(array($username));
    }

    function getAuthenticatedUserByEmail($email){

        global $conn;
        $stmt = $conn->prepare('SELECT * FROM users 
                                INNER JOIN authenticated_user 
                                ON users.user_id = authenticated_user.user_id 
                                WHERE users.email = ? COLLATE NOCASE');
        return $stmt->fetch(array($email));
    }

    function getUserIdFromUser($email){

        global $conn;
        $stmt = $conn->prepare('SELECT user_id FROM users WHERE users.email = ? COLLATE NOCASE');
        return $stmt->fetch(array($email));
    }

?>