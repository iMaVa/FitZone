<?php
	if(!isset($_GET["user"])){
		header("location: /../login/login.php?err=102");
        die();
	}

	require_once __DIR__ . "/../misc/funzioni.php";
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Gestione Soci - Segreteria</title>
        <link rel=stylesheet href="../misc/style.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../misc/icon.png" type="image/jpeg">
    </head>
	<body>
		<form name=formGestioneSoci action="../check/controlloSceltaSegretarioSoci.php" method=POST >
			<h1>Gestione dei soci</h1>
			<h3>Seleziona una delle voci menzionate qui sotto</h3>
			<input type=hidden name=user value=<?php echo $_GET['user'] ?> />
			<div>
				<input type=radio name=gestione value=inserisciSocio id=inserisciSocio checked />
				<label for=inserisciSocio>Inserisci socio</label>
			</div>
			<div>
				<input type=radio name=gestione value=eliminaSocio id=eliminaSocio />
				<label for=eliminaSocio>Elimina socio</label>
			</div>
			<div>
				<input type=radio name=gestione value=scadenzaCM id=scadenzaCM />
				<label for=scadenzaCM>Controlla scadenza del certificato medico o dell'abbonamento</label>
			</div>
			<div>
				<input type=radio name=gestione value=aggiorna id=aggiorna />
				<label for=aggiorna>Aggiorna abbonamento o certificato medico</label>
			</div>
			<div>
				<input type=submit name=procedi value=procedi />
			</div>
		<form>
		<div id=footer>
			<a href="homeSegretario.php?user=<?php echo $_GET["user"] ?>">Torna alla Home Segreteria</a>
		</div>
	</body>
</html>
