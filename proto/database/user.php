<?php
  function getAllUsers($page) {
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.Users LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($page));
    return $stmt->fetchAll();
  }
  
   function getSearchUsers($page, $name) {
    global $conn;
	$param = "%$name%";
    $stmt = $conn->prepare('SELECT public.Users.first_name, public.Users.last_name, public.Users.email, public.Authenticated_User.photo_url
							FROM public.Authenticated_User INNER JOIN public.Users ON (public.Authenticated_User.user_id = public.Users.user_id)
							WHERE public.Users.first_name LIKE ?
							LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($param, $page));
    return $stmt->fetchAll();
  }
?>