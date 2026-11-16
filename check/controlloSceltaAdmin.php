<?php
	if(!isset($_POST["user"])){
		header("location: ../login/login.php?err=102");
        die();
	}

	if(!isset($_POST["prosegui"])){
		header("location: ../login/login.php?err=102");
        die();
	}
	
	var_dump($_POST);
	
	$scelta = $_POST["scelta"];
	$user = $_POST['user']; 
	
	if($scelta == "cambiaRuolo"){
		header("location: ../aree/cambiaRuolo.php?user=$user");
		die();
	}elseif($scelta == "gestisciSoci"){
		header("location: ../aree/gestisciSoci.php?user=$user");
		die();
	}elseif($scelta == "gestisciCorsi"){
		header("location:../aree/gestisciCorsi.php?user=$user");
		die();
	}else{
		header("location: ../aree/homeSocio.php?user=$user&err=default");
		die();
	}

?>