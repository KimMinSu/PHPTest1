<?php

function search(){

	include "../dbconnector/connection.php";
	
	$conn = dbConnect();
	mysql_select_db("board", $conn);
	
	$keyword = $_POST[keyword];
	
	$query = "SELECT * FROM board WHERE contents LIKE '$keyword'";
	
	$result = mysql_query($query);
	
	return $result;	
}	
	

?>
