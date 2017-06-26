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
		$id=$_POST["AuthorID"];
		$sql = "DELETE FROM library.author WHERE author_id=\"".$id."\"";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Delete Author success";
		} else {
			echo $sql."\n";
			echo "Delete Author Fail";
		}
		$conn->close();
	}
 
?>