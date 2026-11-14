<?php
	//var_dump($_POST);
	if(!isSet($_POST["invia"])){
		header("location:login.php?err=2");
		die();
	}
	
	require_once __DIR__ . "/../misc/funzioni.php";
	
	$nomeUtente = trim(($_POST["user"]));
	$password = md5(trim($_POST["pass"]));
	
	$ruolo = getRuolo($nomeUtente, $password);
	
	switch($ruolo){
		case 0:
			header("location:homeAdmin.php?user=$nomeUtente");
			break;
		case 1:
			header("location:homeSegretario.php?user=$nomeUtente");
			break;
		case 2:
			header("location:homeIstruttore.php?user=$nomeUtente");
			break;
		case 3:
			header("location: ../aree/homeSocio.php?user=$nomeUtente");
			break;
		case -1:
			header("location:login.php?err=1");
			break;
		default:
			header("location:login.php?err=4");
			break;
	}
	
	die();
?>