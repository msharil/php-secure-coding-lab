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

<h1>User ID: #<?php echo $id; ?></h1>

<table border="1" style="border-collapse: collapse;" width="20%">
	<tr>
		<td><strong>User</strong></td>
		<td><?php echo $user; ?></td>
	</tr>
	<tr>
		<td><strong>Full Name</strong></td>
		<td><?php echo $name; ?></td>
	</tr>
</table>
<?php 
} else {

	echo '<h2>Sorry! No record found.</h2>';
}

$stmt1->close();

?>

<br>

<a href="user-list.php">Back</a>