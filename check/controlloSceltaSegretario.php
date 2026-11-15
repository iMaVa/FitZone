<?php
	if(!isset($_POST["user"])){
		header("location: /../login/login.php?err=102");
        die();
	}

	if(!isset($_POST["continua"])){
		header("location: /../login/login.php?err=102");
        die();
	}
	
	var_dump($_POST);
	
	$scelta = $_POST["gestisci"];
	$user = $_POST['user']; // fra ti sei dimenticato di mettere su tutte le pagine il type=hidden con l'user
	
	if($scelta == "soci"){
		header("location: ../aree/gestisciSoci.php?user=$user&accesso=1");
		die();
	}elseif($scelta == "corsi"){
		header("location:../aree/gestisciCorsi.php?user=$user&accesso=2");
		die();
	} else {
		header("location: ../aree/homeSocio.php?user=$user&err=default");
		die();
	}

?>