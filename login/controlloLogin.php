<?php
	//var_dump($_POST);
	if(!isSet($_POST["login"])){
		header("location:login.php?err=102");
		die();
	}
	
	require_once __DIR__ . "/../misc/funzioni.php";
	
	$user = trim(($_POST["user"]));
	$pass = md5(trim($_POST["pass"]));

	$ruolo = getRuolo($user, $pass);
	
	switch($ruolo){
		case 0:
			header("location: ../aree/homeAdmin.php?user=$user");
			break;
		case 1:
			header("location: ../aree/homeSegretario.php?user=$user");
			break;
		case 2:
			header("location: ../aree/homeIstruttore.php?user=$user");
			break;
		case 3:
			header("location: ../aree/homeSocio.php?user=$user");
			break;
		case -1:
			header("location: ../login/login.php?err=101");
			break;
		default:
			header("location: ../login/login.php?err=default");
			break;
	}
	
	die();
?>