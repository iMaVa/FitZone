<?php
	if(!isset($_GET["user"])){
		header("location: /../login/login.php?err=102");
        die();
	}

	if(!isset($_GET["accesso"])){
		header("location: /../login/login.php?err=501");
		die();
	}

	require_once __DIR__ . "/../misc/funzioni.php";
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Gestione Corsi - Segreteria</title>
        <link rel=stylesheet href="../misc/style.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
	<body>
		<form name=formGestioneSoci action="../check/controlloSceltaSegretarioSoci.php" method=POST >
			
		<form>
	</body>
</html>
