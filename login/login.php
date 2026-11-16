<?php require_once __DIR__ . "/../misc/funzioni.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pagina di login</title>
		<link rel=stylesheet href="../misc/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../misc/icon.png" type="image/jpeg">
	</head>
	<body>
		<div class="titolo-con-logo">
			<img src="../misc/icon.png" alt="Logo Palestra" class="logo-piccolo">
			<h1>FitZone</h1>
		</div>
		<div class="riquadro">
			<h3>Effettua il login per fare l'accesso alla nostra palestra</h3>
			<?php if(isset($_GET["err"])) errs($_GET["err"]); ?>
			<form name=formDiLogin action="controlloLogin.php" method=POST >
				<div>
					<label for=user>Username:</label>
					<input type=text name=user id=user placeholder=digita required />
				</div>
				<div>
					<label for=pass>Password:</label>
					<input type=password name=pass id=pass placeholder=digita required />
				</div>
				<div>
					<input type=submit name=login value=invia />
				</div>
			</div>
		</form>
	</body>
</html>