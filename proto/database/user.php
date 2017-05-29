<?php

    function createUser($firstname, $lastname, $email){
        global $conn;
        $stmt = $conn->prepare('INSERT INTO public.users(first_name, last_name, email) VALUES (?, ?, ?)');
        $stmt->execute(array($firstname, $lastname, $email));
    }

    function updateUser($firstname, $lastname, $email, $nif, $userId){
        global $conn;
        $stmt = $conn->prepare('UPDATE public.users SET first_name = ?, last_name = ?, email=?, nif=? WHERE user_id = ?'); //TODO: Fazer update
        $stmt->execute(array($firstname, $lastname, $email, $nif, $userId));
    }

    function updateAuthenticatedUser($username, $password, $userId){
        global $conn;

        if ($password == null || $password == ''){
            $stmt = $conn->prepare('UPDATE public.authenticated_user SET username = ? WHERE user_id = ?');
            $stmt->execute(array($username, $userId));
        }
        else{
            $stmt = $conn->prepare('UPDATE public.authenticated_user SET username = ?, password = ? WHERE user_id = ?');
            $stmt->execute(array($username, sha1($password), $userId));
        }
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
	
	    function getTotalUsersFromId($id){
        global $conn;
        $stmt = $conn->prepare('SELECT *
								FROM public.authenticated_user, public.users
								WHERE public.authenticated_user.user_id = ? AND
								public.authenticated_user.user_id = public.users.user_id;');
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
	
	function getByUsername($username) {
        global $conn;
        $stmt = $conn->prepare('SELECT * 
                                FROM public.authenticated_user 
                                WHERE username = ?');
        $stmt->execute(array($username));
        return $stmt->fetchAll();
    }
	
    function isLoginCorrect($username, $password) {
        global $conn;
        $stmt = $conn->prepare('SELECT * 
                                FROM public.authenticated_user 
                                WHERE (username = ?) AND (password = ?) AND user_state = ?;');
        $stmt->execute(array($username, sha1($password), 'active'));
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
        $stmt = $conn->prepare('SELECT public.Users.first_name, public.Users.last_name, public.Users.email, public.Authenticated_User.photo_url, public.Authenticated_User.username, public.Authenticated_User.username, public.Authenticated_User.user_id
                                FROM public.Authenticated_User INNER JOIN public.Users ON (public.Authenticated_User.user_id = public.Users.user_id)
                                WHERE (upper(last_name) LIKE upper(?) OR upper(first_name) LIKE upper(?) OR upper(username) LIKE upper(?)) 
                                ORDER BY first_name ' . $asc .
                                ' LIMIT 10 OFFSET ? * 10;');
        $stmt->execute(array($param, $param, $param, $page));
        return $stmt->fetchAll();
	}

    function searchUserByUsername($name, $username) {
        global $conn;
        //$param = "%$name%";
        $stmt = $conn->prepare('SELECT public.authenticated_user.username, public.Authenticated_User.photo_url, public.Authenticated_User.user_id, ts_rank(to_tsvector(username), query) AS rank
                                        FROM public.Authenticated_User , to_tsquery(?) AS query
                                        WHERE (upper(username) <> upper(?))
                                        ORDER BY rank DESC');
        $name = $name.":*";
        $stmt->execute(array($name, $username));
        return $stmt->fetchAll();
    }

    /*function searchUserByUsername($name, $username) {
        global $conn;
        $param = "%$name%";
        $stmt = $conn->prepare('SELECT public.authenticated_user.username, public.Authenticated_User.photo_url, public.Authenticated_User.user_id
                                    FROM public.Authenticated_User 
                                    WHERE (upper(username) LIKE upper(?) AND upper(username) <> upper(?)) 
                                    ORDER BY username ASC');
        $stmt->execute(array($param, $username));
        return $stmt->fetchAll();
    }*/
	
	function getUserTickets($user_id) {
        global $conn;
        $stmt = $conn->prepare('SELECT ticket_type, name, ticket_id, public.Meta_Event.meta_event_id, ticket_purchase_date
                                    FROM public.Ticket, public.Type_of_Ticket, public.Meta_Event
                                    WHERE public.Ticket.user_id = ? AND
									public.Ticket.type_of_ticket_id = public.Type_of_Ticket.type_of_ticket_id AND
									public.Type_of_Ticket.meta_event_id = public.Meta_Event.meta_event_id');
        $stmt->execute(array($user_id));
        return $stmt->fetchAll();
    }
	
	function getNotifications($user_id) {
		global $conn;
        $stmt = $conn->prepare('SELECT *
                                    FROM (public.Notification
									LEFT JOIN public.Meta_Event ON public.Meta_Event.meta_event_id = public.Notification.event_id)
									LEFT JOIN public.Authenticated_User ON public.Authenticated_User.user_id = public.Notification.user_id 
                                    WHERE public.Notification.user_id = ?;');
        $stmt->execute(array($user_id));
        return $stmt->fetchAll();
	}

    //TODO: Usar full text search para pesquisa de nome completo, para username, talvez usar like (?)
/*
    function test($name) {
        global $conn;
        $param = "%$name%";
        $stmt = $conn->prepare(
            'SELECT public.Users.username
            FROM public.Users
            WHERE to_tsquery(?)'
        );
        $stmt->execute(array($param, $param));
        return $stmt->fetchAll();
    }*/
?>