<?php
	$servername = "localhost";
	$username = $_POST["account"];
	$password=$_POST["password"];
	$conn =  new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	else
	{
		$id=$_POST["PublisherID"];
		$sql = "DELETE FROM library.publisher WHERE publisher_id=".$id.";";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Delete Publisher success";
		} else {
			echo $sql."\n";
			echo "Delete Publisher Fail";
		}
		$conn->close();
	}
 
?>