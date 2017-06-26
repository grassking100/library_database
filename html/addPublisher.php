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
		$name=$_POST["PublisherName"];
		$address=$_POST["PublisherAddress"];
		$phone=$_POST["PublisherPhoneNumber"];
		$sql = "INSERT INTO library.publisher (address, phone_number, name)
		VALUES 
		(".
			"\"".$address."\",".
			"\"".$phone."\",".
			"\"".$name."\""
		.");";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Insert Publisher success";
		} else {
			echo $sql."\n";
			echo "Insert Publisher Fail";
		}
		$conn->close();
	}
 
?>