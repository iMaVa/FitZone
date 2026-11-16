<?php 
	if(!isset($_GET['user'])) {
		header("location: ../login/login.php?err=102");
		die();
	}

	require_once __DIR__ . "/../misc/funzioni.php";
?>

<!DOCTYPE html>
<html>
	<head>
        <title>Home - Admin</title>
        <link rel=stylesheet href="../misc/style.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../misc/icon.png" type="image/jpeg">
    </head>
	<body>
		<form name=formAdmin action="../check/controlloSceltaAdmin.php" method=post >
			<?php
				if(isset($_GET["user"])){
					$user = $_GET["user"];
					echo "<h1>Benvenuto $user</h1>";
				}
			?>
			<h2>Effettua una scelta</h2>
			<input type=hidden name=user value=<?php echo $_GET['user'] ?> />
			<?php if(isSet($_GET['err'])) errs($_GET['err']); ?>
			<div>
				<input type=radio name=scelta value=cambiaRuolo id=cambiaRuolo checked />
				<label for=cambiaRuolo>Cambia ruolo di un utente</label>
			</div>
			<div>
				<input type=radio name=scelta value=gestisciSoci id=gestisciSoci />
				<label for=gestisciSoci>Gestisci soci</label>
			</div>
			<div>
				<input type=radio name=scelta value=gestisciCorsi id=gestisciCorsi />
				<label for=gestisciCorsi>Gestisci corsi</label>
			</div>
			<div>
				<input type=submit name=prosegui value=prosegui />
			</div>
			<div id=footer>
				<a href="../login/login.php">Log Out</a>
			</div>
		<form>
	</body>
</html>
