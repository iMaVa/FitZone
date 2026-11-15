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
		header("location:gestisciSoci.php?user=$user&accesso=1");
		die();
	}else{
		if($scelta == "corsi"){
			header("location:gestisciCorsi.php?user=$user&accesso=2");
			die();
		}
	}

?>