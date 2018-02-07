<?php 
session_start();
$user = $_SESSION['pengguna'];

if(!isset($_SESSION['pengguna'])){
    header('Location: index.php');
	die();
} 
?>

<h1>Search User</h1>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<input type="text" name="param" value="" placeholder="Username" autocomplete="off" required="">
	<input type="submit" value="Parameter" name="btnSearch">	
</form>
<?php 
if (isset($_POST['btnSearch'])) {
	
	$param = trim($_POST['param']);		$param = stripslashes($param);

	include 'db_local.php';

	$search = "%{$param}%";
	$sql = "SELECT id, user, fullname FROM login1 WHERE user LIKE ? OR fullname LIKE ? ";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ss", $search, $search);

	if($stmt->execute()) {

		$stmt->store_result();
		$stmt->bind_result($id, $uName, $fName);

		if($stmt->num_rows > 0) {

			echo '<table border="1" cellspacing=0>';
			echo '<tr>';
			echo '<th>Username</th>';
			echo '<th>Fullname</th>';
			echo '<th>Action</th>';
			echo '</tr>';
			while($stmt->fetch()) {

				echo '<tr>';
				//while($stmt->fetch()){
					echo '<td>'.$uName.'</td>';
					echo '<td>'.$fName.'</td>';
					echo '<td>';
					echo '<a href="view.php?id='.$id.'" >View</a>';
					echo '</td>';
				//}
				echo '</tr>';
			}
			echo '</table>';

		} else {
			echo '<p>No record exist</p>';
		}

	} else {
		echo 'Error X02';
	}

	$stmt->close();	

}
?>
<p>
	<a href="user-list.php">List of Users</a> | 
	<a href="logout.php">Logout</a>
</p>