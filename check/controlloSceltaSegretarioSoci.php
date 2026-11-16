<?php
	if(!isset($_POST["user"])){
		header("location: ../login/login.php?err=102");
        die();
	}

	if(!isset($_POST["procedi"])){
		header("location: ../login/login.php?err=102");
		die();
	}

	require_once __DIR__ . "/../misc/funzioni.php";

	var_dump($_POST);
	
	
	$redirect = $_POST["gestione"];
	$user = $_POST["user"];

	redirectaSegretario($redirect, $user); // bel linguaggio negro
	
?>