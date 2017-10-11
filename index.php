<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="">Username</label>
		<input type="text" name="user" value="" autocomplete="off" required="">
		<label for="">Passphrase</label>
		<input type="password" name="passwd" value="" autocomplete="off" required="">	
		<input type="submit" value="Login" name="btnLogin">	
		</form>
		<?php 
		if(isset($_POST['btnLogin'])) {
			$user = trim($_POST['user']);		$user = stripslashes($user);
			$passwd = trim($_POST['passwd']);	$passwd = stripslashes($passwd); 	$passwd = MD5($passwd);			

			include 'db_local.php';

			$sql = "SELECT user, fullname FROM login1 WHERE user = ? AND passwd = ? ";

			$stmt = $conn->prepare($sql);
			$stmt->bind_param("ss", $user, $passwd);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($uName, $fName);

			if($stmt->fetch()) {								
				
				if(!empty($uName))
				{
					session_start();
					$_SESSION['pengguna'] = $user;
					header('Location: main.php');
					exit();
				} else {
					echo 'Password missmatch!';
				}
			}				
			else 
				echo 'Error X01 ';

			$stmt->close();

		} ?>
	</body>
</html>