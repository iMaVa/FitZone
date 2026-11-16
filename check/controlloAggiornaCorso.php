<?php 
    if(!isset($_POST["user"])){
		header("location: ../login/login.php?err=102");
        die();
	}

	if(!isset($_POST["aggiornaCorso"])){
		header("location: ../login/login.php?err=102");
		die();
	}

    require_once __DIR__ . "/../misc/funzioni.php";

    $user = $_POST["user"];
    $dataUnix = strtotime($_POST['nuovaDataCorso']);
    $nomeCorso = $_POST['listaCorsi'];

    if(aggiornaDataCorso($nomeCorso, $dataUnix)) {
        header("location: ../aree/aggiornaCorso.php?user=$user&ok=1");
        die();
    } else {
        header("location: ../aree/aggiornaCorso.php?user=$user&err=305");
        die();
    }

?>