<?php

	session_start();

	include '../dbconnector/connection.php';
	$conn = dbConnect();
	mysql_select_db("board", $conn);
	
	$id = $_POST[id];
	$password = $_POST[password];
	
	$query = "SELECT email, password, username  FROM member WHERE email='$id'";
	echo $query;
	$result = mysql_query($query);
	$arr = mysql_fetch_array($result);
	$row = mysql_num_rows($result);
	
	if($row){
		$_SESSION['userID'] = $id;
		$_SESSION['userName'] = $arr[username];
	}
	
	echo "<script>history.back();</script>";


?>
