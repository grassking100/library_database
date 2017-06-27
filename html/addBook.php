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
		$Title=$_POST["Title"];
		$Author=$_POST["Author"];
		$Language=$_POST["Language"];
		$PublishDate=$_POST["PublishDate"];
		$Publisher=$_POST["Publisher"];
		$sql = "INSERT INTO library.book (book_name";
		if($PublishDate!='')
		{
			$sql=$sql.",publish_date";
		}
		if($Language!='')
		{
			$sql=$sql.",language";
		}
		if($Publisher!='')
		{
			$sql=$sql.",publisher_id";
		}
		$sql=$sql.")";
		$sql=$sql."VALUES("."\"".$Title."\"";
			if($PublishDate!='')
			{
				$sql=$sql.",\"".$PublishDate."\"";
			}
			if($Language!='')
			{
				$sql=$sql.",\"".$Language."\"";
			}
			if($Publisher!='')
			{
				$sql=$sql.",\"".$Publisher."\"";
			}
		$sql=$sql.");";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Insert Book success\n";
		} else {
			echo $sql."\n";
			echo "Insert Book Fail\n";
		}
		
		$sql = "INSERT INTO library.book_has_author  (book_id,author_id) VALUES(LAST_INSERT_ID(),".$Author.");";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Insert Book's author success\n";
		} else {
			echo $sql."\n";
			echo "Insert Book's author Fail\n";
		}
		
		
		$conn->close();
	}
 
?>