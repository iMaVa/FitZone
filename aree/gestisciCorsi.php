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
        <title>Gestione Corsi</title>
        <link rel=stylesheet href="../misc/style.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../misc/icon.png" type="image/jpeg">
    </head>
	<body>
		<h1>Gestione corsi</h1>
		<h3>Seleziona se vuoi aggiungere, aggiornare o eliminare un corso</h3>
		<form name=formGestioneSoci action="../check/controlloSceltaSegretarioCorsi.php" method=POST >
			<div>
				<input type=radio name=opzioniCorsi value=inserisciCorso checked />
				<label for=inserisciCorso>Inserisci un nuovo corso</label>
			</div>
			<div>
				<input type=radio name=opzioniCorsi value=aggiornaCorso  />
				<label for=aggiornaCorso>Aggiorna la data di un corso</label>
			</div>
			<div>
				<input type=radio name=opzioniCorsi value=eliminaCorso />
				<label for=eliminaCorso>Elimina un corso esistente</label>
			</div>
			
			<div>
				<input type=submit name=procedi value=Invia />
			</div>
			<input type=hidden name=user value=<?php echo $_GET['user'] ?> />
			<?php if(isset($_GET['err'])) errs($_GET['err']) ?>
		<form>
		<div id=footer>
			<a href="homeSegretario.php?user=<?php echo $_GET["user"] ?>">Torna alla Home</a>
			<a href="../login/login.php">Log Out</a>
		</div>
	</body>
</html>
