<?php
	
	include '../dbconnector/connection.php';
	$conn = dbConnect();
	mysql_select_db("board", $conn);
	
	
	$email = $_POST[email];
	$password = $_POST[password];
	$username = $_POST[name];
	$sex = $_POST[sex];
	$cellphone = $_POST[cellphone];
	
	$query = "INSERT INTO member(email, password, username, sex, cellphone) VALUES('$email','$password','$username','$sex','$cellphone')";
	
	$res = mysql_query($query);
	
	if(!$res){
		echo "회원가입 실패";
	}
	
	mysql_close($conn);
	
	header("Location:../../index.php?page=1");
	
?>
