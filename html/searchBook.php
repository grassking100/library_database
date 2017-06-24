<?php
	
   $title=$_POST["title"];
   $author=$_POST["author"];
   $arr = array ("title"=>$title,"author"=>$author);
   $data =array('title' => 1, 'author' => 2);
	$json= json_encode($data);
if ($json) {
	header('Content-Type:application/json');
	echo $json;
}else
{
	echo "false";
}
?>