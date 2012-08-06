<?php
	include '../dbconnector/connection.php';
	include '../session/session.php';
	
	session_begin();
	$conn = dbConnect();
	mysql_select_db("board", $conn);

	
	$title = $_POST[title];
	$contents = $_POST[contents];
	//echo $_SESSION['userName'];
	$author = $_SESSION['userName'];
	
	$query = "INSERT INTO board(title, contents, author) VALUES('$title','$contents','$author')";
	//$query = "INSERT INTO board(title, contents) VALUES('hello','sun of bitch!')";

	$isInsert = mysql_query($query) || die(mysql_error());
	mysql_close($conn);
	
	header("Location:../../index.php?page=1");
?>