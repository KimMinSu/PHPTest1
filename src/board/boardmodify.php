<?php
	include '../dbconnector/connection.php';
	$conn = dbConnect();
	mysql_select_db("board", $conn);
	
	$query = "UPDATE board SET title='$_POST[title]', contents='$_POST[contents]' WHERE id=".$_GET[no];
	mysql_query($query, $conn);
	mysql_close($conn);
	
	header("Location:../../index.php?page=1");
	exit;
?>