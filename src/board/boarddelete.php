<?php

	include '../dbconnector/connection.php';

	$conn = dbConnect();

	mysql_select_db("board", $conn);
	
	$query = "DELETE FROM board WHERE id=".$_GET[no];
	$query2 = "DELETE FROM comment WHERE board_id=".$_GET[no];
	mysql_query($query);
	mysql_query($query2);
	
	mysql_close($conn);
	
	header("Location:../../index.php");
?>