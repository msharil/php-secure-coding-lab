<?php 

function getUser($param)
{
	$param = trim($param);		$param = stripslashes($param);

	include 'db_local.php';

	$sql = "SELECT user, fullname FROM login1 WHERE user = ?  ";

	// execute
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $param);
	$stmt->execute();

	// mapping result vs value to be displayed
	$stmt->store_result();
	$stmt->bind_result($uName, $fName);

	if($stmt->fetch()) {								
		echo $uName.' '.$fName;
	} else {
		echo 'No records found';
	}

}
?>