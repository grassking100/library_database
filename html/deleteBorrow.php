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
		$lB=$_POST["lB2"];
		$pB=$_POST["pB2"];

		$sql = "UPDATE library.physical_book SET book_id=".$lB." ,physical_book_id=".$pB." ,borrower_user_id=NULL WHERE ";
		$sql=$sql."book_id=".$lB." and physical_book_id=".$pB."";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Delete Borrow success\n";
		} else {
			echo $sql."\n";
			echo "Delete Borrow Fail\n";
		}
		
		$conn->close();
	}
 
?>