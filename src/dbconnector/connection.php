<?php

function dbConnect(){
	$connection = mysql_connect("localhost", "root", "apmsetup");
	if (!$connection){
		die('DB ���� ����'.mysql_error());
	}
	
	return $connection;
}

?>