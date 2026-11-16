<?php 
	if(!isset($_GET['user'])) {
		header("location: ../login/login.php?err=102");
		die();
	}

	require_once __DIR__ . "/../misc/funzioni.php";
	
	$user = $_GET['user'];
	$soci = getSoci(); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Aggiorna Certificato e Abbonamento</title>
		<link rel=stylesheet href="../misc/style.css" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../misc/icon.png" type="image/jpeg">
	</head>
	<body>
		<form name=formAggiorna action="../check/controlloAggiornaCFeAB.php" method=post >
			<h2>Aggiorna Abbonamento e Certificato Medico</h2>
			<input type=hidden name=user value="<?php echo $user; ?>" />
			
			<?php 
				if(isset($_GET['err'])) {
					errs($_GET['err']); 
				}
				if(isset($_GET['ok']) && $_GET['ok'] == 1) {
					echo "<p class=valido>Dati aggiornati correttamente!</p>";
				}
			?>

			<div>
				<label for=utenteAggiorna>Utenti:</label>
				<select name=utente id=utenteAggiorna>
					<?php
						foreach($soci as $chiave => $valore){
							echo "<option value=\"$valore\">$valore</option>";
						}
					?>
				</select>
			</div>

			<div>
				<label for=dataAbb>Data abbonamento da aggiornare:</label>
				<input type=date name=dataAbb id=dataAbb min="<?php echo date("Y-m-d") ?>" />
			</div>

			<div>
				<label for=dataCM>Data C.M da aggiornare:</label>
				<input type=date name=dataCM id=dataCM min="<?php echo date("Y-m-d") ?>" />
			</div>

			<div>
				<input type=submit name=invia value="INVIA" <?php echo empty($soci) ? "disabled" : "" ?> />
			</div>

			<div id=footer>
				<a href="../aree/gestisciSoci.php?user=<?php echo $user; ?>">Torna alla gestione soci</a> 
				<a href="../login/login.php">Log Out</a>
			</div>
		</form>
	</body>
</html>