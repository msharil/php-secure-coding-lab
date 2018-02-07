<?php 

// Database connection
include 'db_local.php';

// SQL Statement
(isset($_POST['txtUser']) ? $user = $_POST['txtUser'] : $user = NULL);
(isset($_POST['txtFullname']) ? $fullname = $_POST['txtFullname'] : $fullname = NULL);
(isset($_POST['txtPass']) ? $passwd = $_POST['txtPass'] : $passwd = NULL);

$passwd = MD5($passwd);

$sql = "INSERT INTO login1 (user, fullname, PASSWD) VALUES (?, ?, ?)";

// Prepare to connect DB & Execute the SQL Statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $user, $fullname, $passwd);

if($stmt->execute()){
	$stmt->close();
	header('Location: user-list.php');
	exit();
}

?>