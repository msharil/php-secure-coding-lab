<?php 

// Database connection
include 'db_local.php';

// SQL Statement
(isset($_POST['txtUser']) ? $user = $_POST['txtUser'] : $user = NULL);
(isset($_POST['txtFullname']) ? $fullname = $_POST['txtFullname'] : $fullname = NULL);
(isset($_POST['txtID']) ? $ID = $_POST['txtID'] : $ID = NULL);

$sql = "UPDATE login1 SET user = ?, fullname = ? WHERE id = ? ";

// Prepare to connect DB & Execute the SQL Statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $user, $fullname, $ID);

if($stmt->execute()){
	$stmt->close();
	header('Location: user-list.php');
	exit();
}

?>