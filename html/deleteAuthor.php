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
		$id=$_POST["AuthorID"];
		$sql = "DELETE FROM library.book_has_author WHERE author_id=\"".$id."\"";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Delete Book-Author success\n";
		} else {
			echo $sql."\n";
			echo "Delete Book-Author Fail\n";
		}
		$sql = "DELETE FROM library.author WHERE author_id=\"".$id."\"";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Delete Author success\n";
		} else {
			echo $sql."\n";
			echo "Delete Author Fail\n";
		}
		$conn->close();
	}
 
?>