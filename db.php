<?php

$servername = "localhost";
$username = "group3";
$password = "mygroup3";
$dbname = "group3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	//die("Connection failed: " . $conn->connect_error);
	echo "Sorry, this website is experiencing problems.";

}

?>