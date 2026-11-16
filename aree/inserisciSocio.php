<?php
	if(!isset($_GET['user'])) {
		header("location: /../login/login.php?err=102");
		die();
	}

	require_once __DIR__ . "/../misc/funzioni.php";

	$user = $_GET['user'];
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Inserizione Socio - Segreteria</title>
        <link rel=stylesheet href="../misc/style.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../misc/icon.png" type="image/jpeg">
    </head>
	<body>
		<form name=formInserimentoSocio action=../check/controlloGestioneSoci.php method=post >
			<h2>Inserisci Utente:</h2>
			<input type=hidden name=user value=<?php echo $_GET['user'] ?> />
			<!-- ti ho già preparato il type hidden per l'user, così poi non te lo dimentichi -->
			<?php 
				if(isset($_GET['successo'])) echo "<p class=valido>Socio aggiunto con successo!</p>";
			?>
			<div>
				<label for=nomeUtente>Nome Utente:</label>
				<input type=text name=nomeUtente id=nomeUtente placeholder=digita required />
			</div>
			<div>
				<label for=password>Password:</label>
				<input type=password name=password id=password placeholder=digita required />
			</div>
			<div>
				<label for=confPass>Conferma Password:</label>
				<input type=password name=confPass id=confPass placeholder=digita required />
			</div>
			<div>
				<label for=ruolo>Ruolo:</label>
				<input type=number name=ruolo id=ruolo min=0 max=3 placeholder=0 required />
			</div>
			<div>
				<input type=submit name=inserisci value=inserisci />
			</div>
		<form>

		<div id=footer>
			<a href="../aree/gestisciSoci.php?user=<?php echo $user; ?>">TORNA ALLA GESTIONE SOCI</a> 
		</div>
	</body>
</html>

