<?php
	if(!isset($_POST['user'])) {
		header("location: ../login/login.php?err=102");
		die();
	}

	require_once __DIR__ . "/../misc/funzioni.php";

	if(isset($_POST['controlla'])){
		$user = $_POST['user'];

		if(!isset($_POST['utente']) || trim($_POST['utente']) == "" || !esisteUtente($_POST['utente'])){
			header("location: ../aree/scadenzaCMeAB.php?user=$user&err=201");
			die();
		}

		$socio = trim($_POST['utente']);
		header("location: ../aree/scadenzaCMeAB.php?user=$user&socio=$socio");
		die();
	}
?>