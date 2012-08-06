<?php

function session_begin(){
	session_start();
	session_cache_limiter('none');
	if ($_SESSION['userName'] == ""){
		//header("Location:http://localhost/PHPTest1/index.php?page=1");
	}
}

?>