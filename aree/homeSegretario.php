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
        <title>Home - Segreteria</title>
        <link rel=stylesheet href="../misc/style.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
	<body>
		<form name=formSegretario action="../check/controlloSceltaSegretario.php" method=post >
			<?php
				if(isset($_GET["nomeUtente"])){
					$nomeUtente = $_GET["nomeUtente"];
					echo "<h1>Benvenuto $nomeUtente</h1>";
				}
			?>
			<h2>Effettua una scelta</h2>
			<input type=hidden name=user value=<?php echo $_GET['user'] ?> />
			<?php if(isSet($_GET['err'])) errs($_GET['err']); ?>
			<div>
				<input type=radio name=gestisci value=soci id=gestisciSoci checked />
				<label for=gestisciSoci>Getisci soci</label>
			</div>
			<div>
				<input type=radio name=gestisci value=corsi id=gestisciCorsi />
				<label for=gestisciCorsi>Getisci corsi</label>
			</div>
			<div>
				<input type=submit name=continua value=continua />
			</div>
		<form>
	</body>
</html>
