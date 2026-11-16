<?php
	if(!isset($_POST['user'])) {
		header("location: ../login/login.php?err=102");
		die();
	}

	require_once __DIR__ . "/../misc/funzioni.php";

	if(isset($_POST['invia'])){
		$user = $_POST['user'];
		$socio = $_POST['utente'];
		$dataAbb = $_POST['dataAbb'];
		$dataCM = $_POST['dataCM'];

		if(!esisteUtente($socio)){
			header("location: ../aree/aggiornaCFeAB.php?user=$user&err=201");
			die();
		}

		// Controlla che le date siano valide (solo se compilate)
		if(($dataAbb != "" && strtotime($dataAbb) === false) || ($dataCM != "" && strtotime($dataCM) === false)){
			header("location: ../aree/aggiornaCFeAB.php?user=$user&err=202");
			die();
		}

		aggiornaCFeAB($socio, $dataAbb, $dataCM);
		header("location: ../aree/aggiornaCFeAB.php?user=$user&ok=1");
		die();
	}
?>