<?php
	$servername = "localhost";
	$username = "newuser2";
	$password="newpassword";
	//$username = "root";
	//$password = "ntnu1234";
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
		$sql = "SELECT book_name,publish_date,language,email,a.name as author_name,p.name as publisher_name ,a.email as author_email,p.phone_number as publisher_phone,p.address as publisher_address,a.phone_number as author_phone 
			    FROM library.book as b left outer join library.book_has_author as ba natural join library.author as a on b.book_id=ba.book_id left outer join library.publisher as p on b.publisher_id=p.publisher_id";
		if($_POST["useCondition"]=== "true")
		{
			
			$sql=$sql." where b.book_name=\"".$_POST["title"]."\"".$_POST["operation"] ." a.name=\"".$_POST["author"]."\";";
		}
		else
		{
			$sql=$sql.";";
		}
		//$sql = "SELECT book_name FROM library.book;";
	
		$result = $conn->query($sql);
		if($result)
		{
			$returnResult=array();
			while($row = $result->fetch_assoc()) {
				$temp= array(
					book_name=>$row["book_name"],
					author_name=>$row["author_name"],
					language=>$row["language"],
					publish_date=>$row["publish_date"],
					publisher_name=>$row["publisher_name"],
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
				//echo "Fail to convert query to json\n";//$result;
			}
		
		}
		else
		{
		//	echo "fail to query\n";
		}
		
		$conn->close();
	}
 
?>