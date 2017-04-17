<?php
  function getAllUsers($page) {
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.Users LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($page));
    return $stmt->fetchAll();
  }
  
   function getSearchUsers($page, $name) {
    global $conn;
	echo "SELECT  public.Users.first_name, public.Users.last_name, public.Users.email, public.Authenticated_User.photo_url
							FROM public.Authenticated_User, public.Users
							WHERE public.Authenticated_User.user_id = public.Users.user_id AND public.Users.first_name LIKE '%$name%'
							LIMIT 10 OFFSET $page * 10;";
    /*$stmt = $conn->prepare('SELECT  public.Users.first_name, public.Users.last_name, public.Users.email, public.Authenticated_User.photo_url
							FROM public.Authenticated_User, public.Users
							WHERE public.Authenticated_User.user_id = public.Users.user_id AND public.Users.first_name LIKE \'%?%\'
							LIMIT 10 OFFSET ? * 10;');*/
	$stmt = $conn->prepare("SELECT * FROM public.Authenticated_User, public.Users WHERE public.Users.first_name LIKE '%c%' LIMIT 10 OFFSET 1 * 10;");
    $stmt->execute();
    return $stmt->fetchAll();
  }
?>