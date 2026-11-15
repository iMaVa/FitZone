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
        <title>Gestione Corsi - Segreteria</title>
        <link rel=stylesheet href="../misc/style.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
	<body>
		<h1>Gestione corsi</h1>
		<h3>Seleziona se vuoi aggiungere o eliminare un corso</h3>
		<form name=formGestioneSoci action="../check/controlloSceltaSegretarioCorsi.php" method=POST >
			<?php if(isset($_GET['err'])) errs($_GET['err']) ?>
			<div>
				<input type=radio name=opzioniCorsi value=inserisciCorso checked />
				<label for=inserisciCorso>Inserisci un nuovo corso</label>
			</div>
			<div>
				<input type=radio name=opzioniCorsi value=eliminaCorso  />
				<label for=eliminaCorso>Elimina un corso esistente</label>
			</div>
			<div>
				<input type=submit name=procedi value=Invia />
			</div>
			<input type=hidden name=user value=<?php echo $_GET['user'] ?> />
		<form>
		<div id=footer>
			<a href="homeSegretario.php?user=<?php echo $_GET["user"] ?>">Torna alla Home Segreteria</a>
		</div>
	</body>
</html>
