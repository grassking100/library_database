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
		$id=$_POST["UserID"];
		$sql = "SELECT account,isAdministrator FROM library.user WHERE user_id=\"".$id."\"";
	
		$result = $conn->query($sql);		

			while($row = $result->fetch_assoc()) {
				$isSuper=$row["isAdministrator"];
				//echo $isSuper."\n\n";
				$superAccount=$row["account"];
				//echo $superAccount."\n\n";
				$superPassword=$row["account"];
				//echo $superPassword."\n\n";
				break;
			}
		$result->close();
		
		$sql = "DELETE FROM library.user WHERE user_id=\"".$id."\"";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Delete User success\n";
		} else {
			echo $sql."\n";
			echo "Delete User Fail\n";
		}
		if($isSuper==="1")
		{
			$sql = "DELETE FROM mysql.user WHERE  host='%' and user=\"".$superAccount."\"";
			$result = $conn->query($sql);
			if ($result=== TRUE) {
				echo "Delete Super User success";
			} else 
			{
				echo $sql."\n";
				echo "Delete Super User Fail";
			}
			
		}
		
		$conn->close();
	}
 
?>