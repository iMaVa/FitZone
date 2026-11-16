<?php 
    if(!isset($_POST["user"])){
		header("location: ../login/login.php?err=102");
        die();
	}

	if(!isset($_POST["inserisciCorso"])){
		header("location: ../login/login.php?err=102");
		die();
	}

    require_once __DIR__ . "/../misc/funzioni.php";

    print_r($_POST);

    $user = $_POST['user'];
    $istruttore = $_POST['listaIstruttori'];
    $nomeCorso = $_POST['nomeCorso'];
    $dataString = $_POST['dataCorso'];
    $dataUnix = strtotime($dataString);
    $durata = $_POST['durataCorso'];

    if(inserisciCorso($istruttore, $nomeCorso, $dataUnix,$durata)) {
        header("location: ../aree/inserisciCorso.php?user=$user&ok=1");
        die();
    } else {
        header("location: ../aree/inserisciCorso.php?user=$user&err=304");
        die();
    }
    
?>