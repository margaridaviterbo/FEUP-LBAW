<?php
  function getAllUsers() {
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM public.Users');
    $stmt->execute();
    return $stmt->fetchAll();
  }
?>