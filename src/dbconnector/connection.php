<?php

function dbConnect(){
	$connection = mysql_connect("localhost", "root", "apmsetup");
	if (!$connection){
		die('DB 연결 실패'.mysql_error());
	}
	
	return $connection;
}

?>