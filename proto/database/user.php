<?php
  function getAllUsers($page) {
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.Users LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($page));
    return $stmt->fetchAll();
  }
  
   function getAllUsers($page, $name) {
    global $conn;
    $stmt = $conn->prepare('SELECT  *
							FROM public.Authenticated_User, public.Users
							WHERE public.Users.first_name LIKE '%?%'
							LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($page, $name));
    return $stmt->fetchAll();
  }
?>