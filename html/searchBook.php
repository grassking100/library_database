<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "root";
	$database="library";
	// Create connection
	$conn =  new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
		#echo $conn->connect_error;
		header('Content-Type:text/plain');
		die("Connection failed: " . $conn->connect_error);
	} 
	else
	{
		//echo "Connected successfully";
		//$title=$_POST["title"];
		//$author=$_POST["author"];
		//$arr = array ("title"=>$title,"author"=>$author);
		$sql = "SELECT * FROM library.book";
		$result = $conn->query($sql);
		 while($row = $result->fetch_assoc()) {
			echo "book_name: " . $row["book_name"]."\n";
		}
		
		#$json= json_encode($result);
		if ($json) 
		{
			
			header('Content-Type:application/json');
			header('Content-Type:text/plain');
			echo $result;
		}
		else
		{
			echo "json fail";
		}
	}
 
?>