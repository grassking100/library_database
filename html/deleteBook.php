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
		$BookID=$_POST["BookID"];
		$sql = "DELETE FROM library.book_has_author WHERE book_id=\"".$BookID."\"";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Delete Book-author success\n";
		} else {
			echo $sql."\n";
			echo "Delete Book-author Fail\n";
		}
		$sql = "DELETE FROM library.book WHERE book_id=\"".$BookID."\"";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Delete Book success";
		} else {
			echo $sql."\n";
			echo "Delete Book Fail";
		}
		$conn->close();
	}
 
?>