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
		$name=$_POST["PublisherName"];
		$address=$_POST["PublisherAddress"];
		$phone=$_POST["PublisherPhoneNumber"];
		$sql = "INSERT INTO library.publisher (name";
		if($phone!='')
		{
			$sql=$sql.",phone_number";
		}
		if($address!='')
		{
			$sql=$sql.",address";
		}
		$sql=$sql.")";
		$sql=$sql."VALUES("."\"".$name."\"";
			if($phone!='')
			{
				$sql=$sql.",\"".$phone."\"";
			}
			if($address!='')
			{
				$sql=$sql.",\"".$address."\"";
			}
		$sql=$sql.");";
		$result = $conn->query($sql);
		if ($result=== TRUE) {
			echo "Insert Publisher success";
		} else {
			echo $sql."\n";
			echo "Insert Publisher Fail";
		}
		$conn->close();
	}
 
?>