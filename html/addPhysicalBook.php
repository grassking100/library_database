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
		$LogicalBookID=$_POST["LogicalBookID"];
		$sql = "INSERT INTO library.physical_book (book_id";
		$sql=$sql.")";
		$sql=$sql."VALUES(\"".$LogicalBookID."\");";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Insert physical Book success\n";
		} else {
			echo $sql."\n";
			echo "Insert physical Book Fail\n";
		}
		
		$conn->close();
	}
 
?>