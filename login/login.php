<?php require_once __DIR__ . "/../misc/funzioni.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pagina di login</title>
		<link rel=stylesheet href="../misc/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<h1>FitZone</h1>
		<h3>Effettua il login per fare l'accesso alla nostra palestra</h3>
		<?php
		/*if(isset($_GET["err"])){
			stampaErrore($_GET["err"]);
		}*/
		?>
		<form name=formDiLogin action=controlloLogin.php method=post >
			<div>
				<label for=nomeUtente>Username:</label>
				<input type=text name=user id=user placeholder=digita required />
			</div>
			<div>
				<label for=password>Password:</label>
				<input type=password name=pass id=pass placeholder=digita required />
			</div>
			<div>
				<input type=submit name=invia value=invia />
			</div>
		</form>
	</body>
</html>