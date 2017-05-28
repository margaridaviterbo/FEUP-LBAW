<?php

include_once('../../config/init.php');
include_once($BASE_DIR . 'database/user.php');

//$name = $_POST['name'];

$response = array();

$name = $_POST['name'];

$users = searchUserByUsername($name);

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