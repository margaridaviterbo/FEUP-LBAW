<?php
  function getAllUsers() {
    global $conn;
    $stmt = $conn->prepare('SELECT * FROM Users');
    $stmt->execute();
    return $stmt->fetchAll();
  }
?>