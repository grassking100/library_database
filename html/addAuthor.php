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
		$name=$_POST["AuthorName"];
		$email=$_POST["AuthorEmail"];
		$phone=$_POST["AuthorPhoneNumber"];
		$sql = "INSERT INTO library.author (name";
		if($phone!='')
		{
			$sql=$sql.",phone_number";
		}
		if($email!='')
		{
			$sql=$sql.",email";
		}
		$sql=$sql.")VALUES (\"".$name."\"";
		if($phone!='')
		{
			$sql=$sql.",\"".$phone."\"";
		}
		if($email!='')
		{
			$sql=$sql.",\"".$email."\"";
		}
		$sql=$sql.");";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Insert Author success";
		} else {
			echo $sql."\n";
			echo "Insert Author Fail";
		}
		$result->free();
		$conn->close();
	}
 
?>