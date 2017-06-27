<?php
	$servername = "localhost";
	$username = "guest";
	$password="guest";
	$database="library";
	//
	//port:3306
	// Create connection
	$conn =  new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
		//header('Content-Type:text/plain');
		//echo "false";
		die("Connection failed: " . $conn->connect_error);
	} 
	else
	{
		$sql = "SELECT * FROM library.author";
		if($_POST["useCondition"]=== "true")
		{
			
			$sql=$sql." where name=\"".$_POST["authorName"]."\";";
		}
		else
		{
			$sql=$sql.";";
		}
		$result = $conn->query($sql);
		if($result)
		{
			$returnResult=array();
			while($row = $result->fetch_assoc()) {
				$temp= array(
					author_id=>$row["author_id"],
					name=>$row["name"],
					phone_number=>$row["phone_number"],
					email=>$row["email"]
					);
				array_push($returnResult,$temp);
			}
			$result->free();
			$json= json_encode($returnResult);
			if ($json) 
			{
			
				header('Content-Type:application/json');
				echo $json;
			}
			else
			{
				echo "Fail to convert query to json\n";
			}
		
		}
		else
		{
			echo "fail to query\n";
		}
		
		$conn->close();
	}
 
?>