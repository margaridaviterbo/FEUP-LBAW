<?php
function isLoginCorrect($username, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM public.Administrator 
                            WHERE username = ? AND password = ?;");
    $stmt->execute(array($username, sha1($password)));
    return $stmt->fetch() == true;
}

function getAdminId($username) {
    global $conn;
    $stmt = $conn->prepare('SELECT administrator_id 
                            FROM public.Administrator
                            WHERE username = ?;');
    $stmt->execute(array($username));
    return $stmt->fetch();
}

function getNotifications() {
	global $conn;
    $stmt = $conn->prepare('Select * 
							from notification, Notification_Intervinient, Authenticated_User
							where notification.notification_id = Notification_Intervinient.notification_id AND
							Authenticated_User.user_id = Notification_Intervinient.user_id;');
    $stmt->execute();
    return $stmt->fetchAll();
}

function addNotificatioinUser($administrator_id, $user_id) {
							
	global $conn;
    $stmt = $conn->prepare('INSERT INTO Notification(notification_type, checked, administrator_id)
							VALUES(\'userReport\', false, ?);');
    $stmt->execute(array($administrator_id));
	
	$stmt2 = $conn->prepare('INSERT INTO Notification_Intervinient(user_id, notification_id)
							VALUES(?, (SELECT MAX(notification_id) FROM Notification));');
    $stmt2->execute(array( $user_id));
}


function delete_user($user_id) {
							
	global $conn;
    $stmt = $conn->prepare('update Authenticated_User SET user_state =\'canceledAdmin\' WHERE user_id= ?');
    $stmt->execute(array($user_id));
}
?>