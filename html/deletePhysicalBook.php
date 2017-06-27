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
		$SubLogicalBookID=$_POST["SubLogicalBookID"];
			$SubPhysicalBookID=$_POST["SubPhysicalBookID"];
		$sql = "DELETE FROM library.physical_book WHERE physical_book_id=\"".$SubPhysicalBookID."\" and book_id=\"".$SubLogicalBookID."\";";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Delete LogicalBook success\n";
		} else {
			echo $sql."\n";
			echo "Delete LogicalBook Fail\n";
		}
		$conn->close();
	}
 
?>