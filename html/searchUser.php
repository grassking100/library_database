<?php
	$servername = "localhost";
	$username = $_POST["account"];
	$password=$_POST["password"];
	$searchAccount=$_POST["searchAccount"];
	$database="library";
	//
	//port:3306
	// Create connection
	$conn =  new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	else
	{
		//$sql = "SELECT * from library.user where account=\"".$searchAccount."\"";
		$sql = "SELECT * FROM library.user left outer join library.physical_book on user_id=borrower_user_id"." where account=\"".$searchAccount."\";";
		$result = $conn->query($sql);
		if($result)
		{
			$returnResult=array();
			while($row = $result->fetch_assoc()) {
				$temp= array(
				book_id=>$row["book_id"],
						user_id=>$row["user_id"],
						name=>$row["name"],
						account=>$row["account"],
						isAdministrator=>$row["isAdministrator"],
						birthday=>$row["birthday"],
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
				echo "Fail to convert query to json\n";//$result;
			}
		
		}
		else
		{
			echo "fail to query\n";
		}
		
		$conn->close();
	}
 
?>