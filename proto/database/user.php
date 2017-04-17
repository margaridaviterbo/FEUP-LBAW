<?php
  function getAllUsers($page) {
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.Users LIMIT 10 OFFSET ? * 10;');
    $stmt->execute(array($page));
    return $stmt->fetchAll();
  }
?>