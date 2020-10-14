<?php
	$siteurl= "http://localhost/cedcoss/register/register.php";
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="root";
	$dbname="test";
	
	// Create connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	 
	}
	

?>