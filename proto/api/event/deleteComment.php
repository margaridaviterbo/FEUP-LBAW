<?php

include_once('../../config/init.php');
include_once($BASE_DIR . 'database/event.php');

$response = array();

$commentId = $_POST['comment'];

deleteComment($commentId);
deleteContent($commentId);

echo json_encode($response);

?>