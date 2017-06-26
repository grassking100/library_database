<?php
	$servername = "localhost";
	$username = "newuser2";
	$password="newpassword";
	$conn =  new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	else
	{
		$UserName=$_POST["UserName"];
		$Account=$_POST["Account"];
		$UserPassword=$_POST["UserPassword"];
		$Birthday=$_POST["Birthday"];
		$UserEmail=$_POST["UserEmail"];
		$IsAdministrator=$_POST["IsAdministrator"];
		$sql = "INSERT INTO library.user (name,account,password,isAdministrator,email";
		if($Birthday!='')
		{
			$sql=$sql.",birthday";
		}
		$sql=$sql.")VALUES (\"".$UserName."\"";
		$sql=$sql.",\"".$Account."\"";
		$sql=$sql.",\"".$UserPassword."\"";
		$sql=$sql.",\"".($IsAdministrator==="true")."\"";
		$sql=$sql.",\"".$UserEmail."\"";
		if($Birthday!='')
		{
			$sql=$sql.",\"".$Birthday."\"";
		}
		$sql=$sql.");";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Insert User success\n";
		} else {
			echo $sql."\n";
			echo "Insert User Fail\n";
		}
		$sql="CREATE USER".
		"\"".$Account."\"".
		"@'%' IDENTIFIED BY ".
		"\"".$UserPassword."\"".
		";";
		$result = $conn->query($sql);
		if ($result=== TRUE) 
		{
			echo "Create USER success\n";
		} else {
			echo $sql."\n";
			echo "Create USER fail\n";
		}
		$status=$IsAdministrator==="true";
		if($status)
		{
			$sql="GRANT ALL PRIVILEGES ON library.* To ".
			"\"".$Account."\"".
			"@'%' IDENTIFIED BY ".
			"\"".$UserPassword."\"";
			$result = $conn->query($sql);
			if ($result=== TRUE) 
			{
			echo "Grant User super power success\n";
			}
			else {
				echo $sql."\n";
				echo "Grant User power fail\n";
			}
		}
		else
		{
			$Arr=array( "book" , "author" , "book_has_author","physical_book","publisher" );
			foreach($Arr as $value)
			{
				$sql="GRANT SELECT ON library.".$value." To ".
				"\"".$Account."\"".
				"@'%' IDENTIFIED BY ".
				"\"".$UserPassword."\"";
				$result = $conn->query($sql);
				if ($result=== TRUE) 
				{
					echo "Grant User power to ".$value." success\n";
				} else {
					echo $sql."\n";
					echo "Grant User power fail\n";
				}
				
			}
			
		}
		
		$conn->close();
	}

?>