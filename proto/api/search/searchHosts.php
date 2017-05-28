<?php

include_once('../../config/init.php');
include_once($BASE_DIR . 'database/user.php');

$response = array();

$name = $_POST['name'];

$usernameLog = $_SESSION['username'];

$users = searchUserByUsername($name, $usernameLog);

if ($users == false){
    $response['success'] = 'error';
    $response['users'] = $users;
}
else{
    $response['users'] = $users;
    $response['success'] = 'success';
}

echo json_encode($response);
?>