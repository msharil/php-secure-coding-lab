<?php 
session_start();
$user = $_SESSION['pengguna'];

if(!isset($_SESSION['pengguna'])){
    header('Location: index.php');
	die();
} 
?>

<h1>Register New User</h1>

<form action="insert.php" method="post">
<table border="1" style="border-collapse: collapse;" width="20%">
	<tr>
		<td><strong>User</strong></td>
		<td><input type="text" name="txtUser"></td>
	</tr>
	<tr>
		<td><strong>Full Name</strong></td>
		<td><input type="text" name="txtFullname"></td>
	</tr>
	<tr>
		<td><strong>Password</strong></td>
		<td><input type="text" name="txtPass"></td>
	</tr>	
	<tr>
		<td></td>
		<td><button type="submit" name="btnSave">Save</button></td>
	</tr>
</table>
</form>

<br>

<a href="main.php">Back</a>