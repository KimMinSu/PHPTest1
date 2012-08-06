<?php

	include '../dbconnector/connection.php';
	$conn = dbConnect();
	mysql_select_db("board", $conn);

	
	$title = $_POST[title];
	$contents = $_POST[contents];
	
	$query = "INSERT INTO board(title, contents) VALUES('$title','$contents')";
	//$query = "INSERT INTO board(title, contents) VALUES('hello','sun of bitch!')";

	$isInsert = mysql_query($query) || die(mysql_error());
	mysql_close($conn);
	
	header("Location:../../index.php?page=1");
?>