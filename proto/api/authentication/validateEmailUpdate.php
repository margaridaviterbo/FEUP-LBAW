<?php
$username = $_POST['name'];

include_once('../../config/init.php');
include_once($BASE_DIR . 'database/user.php');

$user = getAuthenticatedUserByEmail($username);

if($user == false){
    $response['exists'] = false;
} else {
    if ($user['username'] == $_SESSION['username'])
        $response['exists'] = false;
    else
        $response['exists'] = true;
}
echo json_encode($response);

?>