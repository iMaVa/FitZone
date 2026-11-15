<?php
	if(!isset($_GET["procedi"])){
		header("location: /../login/login.php?err=102");
		die();
	}

	if(!isset($_GET["user"])){
		header("location: /../login/login.php?err=102");
        die();
	}
	
	
?>