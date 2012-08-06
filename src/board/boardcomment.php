<?php

	include '../dbconnector/connection.php';
	$conn = dbConnect();
	mysql_select_db("board", $conn);
	
	$comment_contents = $_POST[contents];
	
	$query = "INSERT INTO comment(contents, board_id) VALUES('$comment_contents','$_GET[no]')";
	
	mysql_query($query);
	
	mysql_close($conn);
	
	header("Location:../../view.php?no=$_GET[no]&page=$_GET[page]");
	
?>