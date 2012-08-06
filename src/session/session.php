<?php

function session_begin(){
	session_start();
	session_cache_limiter('none');
	if ($_SESSION['userName'] == ""){
		header("Location:../../index.php?page=1");
	}
}

?>