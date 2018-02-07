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
$sql = "SELECT user, fullname FROM login1 WHERE id = $id ";

// Prepare to connect DB & Execute the SQL Statement
$stmt1 = $conn->prepare($sql);
$stmt1->execute();
$stmt1->store_result();

// Bind the result to new variable -> will using it at line 40 & 45
$stmt1->bind_result($user, $name);

if($stmt1->fetch())
{

	?>

	<h1>Update User #<?= $id; ?></h1>

	<form action="update.php" method="post">
	<table border="1" style="border-collapse: collapse;" width="20%">
		<tr>
			<input type="hidden" name="txtID" value="<?= $id; ?>">
			<td><strong>User</strong></td>
			<td><input type="text" name="txtUser" value="<?= $user; ?>"></td>
		</tr>
		<tr>
			<td><strong>Full Name</strong></td>
			<td><input type="text" name="txtFullname" value="<?= $name; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit" name="btnSave">Update</button></td>
		</tr>
	</table>
	</form>

<?php 
} else {
	echo '<h2>Sorry! No record found.</h2>';
}
?>

<br>

<a href="main.php">Back</a>