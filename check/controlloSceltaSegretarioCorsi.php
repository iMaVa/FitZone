<?php
	if(!isset($_POST["procedi"])){
		header("location: /../login/login.php?err=102");
		die();
	}

	if(!isset($_POST["user"])){
		header("location: /../login/login.php?err=102");
        die();
	}	
	
	$user = $_POST['user'];

	if($_POST['opzioniCorsi'] === "inserisciCorso") {
		header("location: ../aree/inserisciCorso.php?user=$user");
		die();
	} elseif($_POST['opzioniCorsi'] === "eliminaCorso") {
		header("location: ../aree/eliminaCorso.php?user=$user");
	} else {
		header("location: ../aree/homeSegretario.php?user=$user&err=default");
	}

?>