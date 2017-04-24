<?php

    function createUser($firstname, $lastname, $email){
        global $conn;
        $stmt = $conn->prepare('INSERT INTO public.users(first_name, last_name, email) VALUES (?, ?, ?)');
        $stmt->execute(array($firstname, $lastname, $email));
    }

    function updateUser($firstname, $lastname, $email, $nif){
        global $conn;
        $stmt = $conn->prepare('UPDATE public.users SET first_name = ?, last_name = ?, email=?, nif=?'); //TODO: Fazer update
        $stmt->execute(array($firstname, $lastname, $email, $nif));
    }

    function createAuthenticatedUser($user_id, $username, $password){
        global $conn;
        $state = 'active';
        $stmt = $conn->prepare('INSERT INTO public.authenticated_user(user_id, username, password, user_state) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($user_id, $username, sha1($password), $state));
    }

    function authenticatedUserExists($username, $email, $nif){

        $r_email = getAuthenticatedUserByEmail($email);
        $r_username = getAuthenticatedUserByUsername($username);
        $r_nif = checkIfNifExists($nif);

        if ($r_email == NULL && $r_username == NULL && $r_nif == NULL)
            return false;
        else
            return true;
    }

    function checkIfNifExists($nif){
        global $conn;
        $stmt = $conn->prepare('SELECT * FROM public.users WHERE public.users.nif = ?');
        $stmt->execute(array($nif));
        return $stmt->fetch();
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

    function getUserFromId($id){
        global $conn;
        $stmt = $conn->prepare('SELECT * FROM public.users WHERE public.users.user_id = ?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }

    function getAuthenticatedUserFromId($id){
        global $conn;
        $stmt = $conn->prepare('SELECT * FROM public.authenticated_user WHERE public.authenticated_user.user_id = ?');
        $stmt->execute(array($id));
        return $stmt->fetch();
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


    function searchByUsername($username) {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                                FROM public.authenticated_user 
                                WHERE username like '%?%'");
        $stmt->execute(array($username));
        return $stmt->fetchAll();
    }
	
	function getSearchUsers($page, $name, $asc) {
    global $conn;
	$param = "%$name%";
    $stmt = $conn->prepare('SELECT public.Users.first_name, public.Users.last_name, public.Users.email, public.Authenticated_User.photo_url, public.Authenticated_User.username
							FROM public.Authenticated_User INNER JOIN public.Users ON (public.Authenticated_User.user_id = public.Users.user_id)
							WHERE (upper(last_name) LIKE upper(?) OR upper(first_name) LIKE upper(?) OR upper(username) LIKE upper(?)) 
							ORDER BY first_name ' . $asc . 
							' LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($param, $param, $param, $page));
    return $stmt->fetchAll();
	}
?>