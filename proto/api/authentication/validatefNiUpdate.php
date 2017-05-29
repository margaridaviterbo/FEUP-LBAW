<?php
$nif = $_POST['name'];

include_once('../../config/init.php');
include_once($BASE_DIR . 'database/user.php');

$result = checkIfNifExists($nif);

if($result == false){
    $response['exists'] = false;
} else {
    if ($user['username'] == $_SESSION['username'])
        $response['exists'] = false;
    else
        $response['exists'] = true;
}
echo json_encode($response);

?>