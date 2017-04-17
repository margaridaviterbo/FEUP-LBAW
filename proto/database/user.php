<?php
  function getAllUsers($page) {
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.Users LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($page));
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