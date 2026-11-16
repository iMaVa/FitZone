<?php
    if(!isset($_POST["user"])){
		header("location: ../login/login.php?err=102");
        die();
	}

	if(!isset($_POST["eliminaCorso"])){
		header("location: ../login/login.php?err=102");
		die();
	}

    require_once __DIR__ . "/../misc/funzioni.php";

    // print_r($_POST);

    $user = $_POST['user'];
    $corso = trim($_POST['listaCorsi']);

    if(eliminaCorso($corso)) {
        header("location: ../aree/eliminaCorso.php?user=$user&ok=1");
        die();
    } else {
        header("location: ../aree/eliminaCorso.php?user=$user&err=default");
        die();
    }
?>