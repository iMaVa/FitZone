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
    </head>
	<body>
		<form name=formGestioneSoci action="../check/controlloSceltaSegretarioSoci.php" method=POST >
			<h2>Gestione dei soci</h2>
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
	</body>
</html>
