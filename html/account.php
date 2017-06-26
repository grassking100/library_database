<?php
	function login($account,$password) 
	{
		$servername = "localhost";
		$superUsername = "newuser2";
		$superPassword="newpassword";
		$conn =  new mysqli($servername, $superUsername, $superPassword);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		else
		{
			$sql = "SELECT * FROM library.user where account=\"".$account."\" and password=\"".$password."\"";
				//		echo $sql;
			$result = $conn->query($sql);
			if($result)
			{
				$returnResult=array();
				while($row = $result->fetch_assoc()) {
					//echo "Start login\n";
					$temp= array(
						name=>$row["name"],
						account=>$row["account"],
						isAdministrator=>$row["isAdministrator"],
						birthday=>$row["birthday"],
						email=>$row["email"],
					);
					array_push($returnResult,$temp);
				}
				$result->free();
				$json= json_encode($returnResult);
				if ($json) 
				{
					//echo $json;
					//header('Content-Type:application/json');
					echo $json;
					//echo "d";
				}
				else
				{
					echo "Fail to convert query to json\n";
				}
			}
			else
			{
				echo "Fail to query\n";
			}
			$conn->close();
		}
		
	}			

	$servername = "localhost";
	$superUsername = "newuser2";
	$superPassword="newpassword";
	$conn =  new mysqli($servername, $superUsername, $superPassword);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	else
	{
		$sql = "SELECT COUNT(*) as number FROM mysql.user 
		where User=\"".$_POST["account"]."\"";
		$result = $conn->query($sql);
		if($result)
		{
			$returnResult=array();
			while($row = $result->fetch_assoc()) 
			{
				if((int)$row["number"]>=1)
				{
					$result->free();
					$conn->close();
					login($_POST["account"],$_POST["_password"]);
				}
				else
				{
					$result->free();
					$conn->close();
					echo "Cannot found user\n";
				}
				break;
			}

		}
		else
		{
			echo "fail to query\n";
			$conn->close();
		}
		

	}
 
?>