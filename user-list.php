<?php 
session_start();
$user = $_SESSION['pengguna'];

if(!isset($_SESSION['pengguna'])){
    header('Location: index.php');
	die();
} 

if(isset($_GET['id']))
{
	$id = $_GET['id'];
} else {
	$id = NULL;
}

// Database connection
include 'db_local.php';

// SQL Statement
$sql = "SELECT id, user, fullname FROM login1 ";

// Prepare to connect DB & Execute the SQL Statement
$stmt1 = $conn->prepare($sql);
$stmt1->execute();
$stmt1->store_result();

// Bind the result to new variable -> will using it at line 40 & 45
$stmt1->bind_result($id, $uName, $fName);

	if($stmt1->num_rows > 0) {

		echo '<h1>List of Users</h1>';
		echo '<p>';
		echo ' <a href="add-new.php">Add New</a> ';
		echo ' <a href="main.php">Search</a> ';
		echo '</p>';

		echo '<table border="1" cellspacing=0>';
		echo '<tr>';
		echo '<th>Username</th>';
		echo '<th>Fullname</th>';
		echo '<th>Action</th>';
		echo '</tr>';
		while($stmt1->fetch()) {

			echo '<tr>';
			//while($stmt->fetch()){
				echo '<td>'.$uName.'</td>';
				echo '<td>'.$fName.'</td>';
				echo '<td>';
				echo '<a href="view.php?id='.$id.'" >View</a> | ';
				echo '<a href="edit-user.php?id='.$id.'" >Update</a>';
				echo '</td>';
			//}
			echo '</tr>';
		}
		echo '</table>';

	} else {
		echo '<p>';
		echo ' <a href="add-new.php">Add New</a> ';
		echo '</p>';

		echo '<p>No record exist</p>';
	}

$stmt1->close();

?>

<br>

<a href="main.php">Back</a>