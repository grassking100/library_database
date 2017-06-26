<?php
	$servername = "localhost";
	$username = "newuser2";
	$password="newpassword";
	$conn =  new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	else
	{
		$sql ="";
		$result = $conn->query($sql);
		
		
		$conn->close();
	}
 
?>