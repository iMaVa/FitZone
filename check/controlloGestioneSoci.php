<?php
	if(!isset($_POST['user'])){
		header("location: ../login/login.php?err=102");
		die();
	}

	require_once __DIR__ . "/../misc/funzioni.php";
	
	//var_dump($_POST);
	
	if(isset($_POST["inserisci"])){
		$user = $_POST['user'];
		$nomeUtente = trim($_POST['nomeUtente']);
		$password = $_POST['password'];
		$confPass = $_POST['confPass'];
		$ruolo = $_POST['ruolo'];
		if($password != $confPass){
			header("location: ../aree/inserisciSocio.php?user=$user&successo=-1");
			die();
		}
		if(inserisciUtente($nomeUtente, $password, $ruolo)){
			header("location: ../aree/inserisciSocio.php?user=$user&successo=1");
			die();
		}else{
			header("location: ../aree/inserisciSocio.php?user=$user&successo=0");
			die();
		}
	}
	
	if(isset($_POST["elimina"])){
		$user = $_POST['user'];
		if(!isset($_POST['utente']) || trim($_POST['utente']) == ""){
			header("location: ../aree/eliminaSocio.php?user=$user&successo=0");
			die();
		}

		$socioDaEliminare = trim($_POST['utente']);
		
		if(eliminaSocio($socioDaEliminare)){
			header("location: ../aree/eliminaSocio.php?user=$user&successo=1");
			die();
		} else {
			header("location: ../aree/eliminaSocio.php?user=$user&successo=0");
			die();
		}
	}
	
?>
