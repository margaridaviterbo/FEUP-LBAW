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
    $stmt = $conn->prepare('SELECT first_name, last_name, email, photo_url
							FROM public.Authenticated_User INNER JOIN public.Users ON (public.Authenticated_User.user_id = public.Users.user_id)
							WHERE first_name = \'Rui\'
							LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($page));
    return $stmt->fetchAll();
  }
?>