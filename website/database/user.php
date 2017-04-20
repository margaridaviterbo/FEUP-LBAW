<?php

    function createUser($firstname, $lastname, $email, $nif){
        global $conn;
        $stmt = $conn->prepare('INSERT INTO public.users(first_name, last_name, email, nif) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($firstname, $lastname, $email, $nif));
    }

    function updateUser($firstname, $lastname, $email){
        global $conn;
        $stmt = $conn->prepare('INSERT INTO public.users(first_name, last_name) VALUES (?, ?)'); //TODO: Fazer update
        $stmt->execute(array($firstname, $lastname, $email));
    }

    function createAuthenticatedUser($user_id, $username, $password){
        global $conn;
        $state = 'active';
        $stmt = $conn->prepare('INSERT INTO public.authenticated_user(user_id, username, password, user_state) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($user_id, $username, sha1($password), $state));
    }

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
        $stmt = $conn->prepare('SELECT * FROM public.authenticated_user WHERE public.authenticated_user.username = ?');
        $stmt->execute(array($username));
        return $stmt->fetch();
    }

    function getUserByEmail($email){

        global $conn;
        $stmt = $conn->prepare('SELECT * FROM public.users WHERE public.users.email = ?');
        $stmt->execute(array($email));
        return $stmt->fetch();
    }

    function getAuthenticatedUserByEmail($email){

        global $conn;
        $stmt = $conn->prepare('SELECT * FROM public.users 
                                INNER JOIN public.authenticated_user 
                                ON public.users.user_id = public.authenticated_user.user_id 
                                WHERE public.users.email = ?');
        $stmt->execute(array($email));
        return $stmt->fetch();
    }

    function getUserIdFromUser($email){

        global $conn;
        $stmt = $conn->prepare('SELECT user_id FROM public.users WHERE public.users.email = ?');
        $stmt->execute(array($email));

        $row = $stmt->fetch();
        $id = intval($row['user_id']);

        return $id;
    }

    function getUserIdFromAuthenticatedUser($username){

        global $conn;
        $stmt = $conn->prepare('SELECT user_id FROM public.authenticated_user WHERE public.authenticated_user.username = ?');
        $stmt->execute(array($username));

        $row = $stmt->fetch();
        $id = intval($row['user_id']);

        return $id;
    }

    function getUsernameOfUser($email){

        global $conn;
        $stmt = $conn->prepare('SELECT username FROM public.authenticated_user INNER JOIN public.users ON public.authenticated_user.user_id = public.users.user_id WHERE public.users.email = ?');
        $stmt->execute(array($email));
        $row = $stmt->fetch();
        $username = $row['username'];
        return $username;
    }

    function isLoginCorrect($username, $password) {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                                FROM public.authenticated_user 
                                WHERE username = ? AND password = ?");
        $stmt->execute(array($username, sha1($password)));
        return $stmt->fetch() == true;
    }
?>