<?php
	if(!isset($_POST["user"])){
		header("location: ../login/login.php?err=102");
		die();
	}
	
	var_dump($_POST);
	
	if(!isset($_POST["aggiorna"])){
		header("location: ../login/login.php?err=102");
		die();
	}

	$user = $_POST["user"];

	if(!isset($_POST["utente"]) || !isset($_POST["scelta"])){
		header("location: ../aree/gestioneRuolo.php?user=$user&successo=0");
		die();
	}

	$utenteDaModificare = $_POST["utente"];
	$nuovoRuolo = $_POST["scelta"];

	require_once __DIR__ . "/../misc/funzioni.php";

	if(cambiaRuolo($utenteDaModificare, $nuovoRuolo)){
		header("location: ../aree/cambiaRuolo.php?user=$user&successo=1");
	} else {
		header("location: ../aree/cambiaRuolo.php?user=$user&successo=0");
	}
	die();
?>