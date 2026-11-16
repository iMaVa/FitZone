<?php
	if(!isset($_GET["user"])){
		header("location: ../login/login.php?err=102");
		die();
	}
	
	$user = $_GET["user"];
	require_once __DIR__ . "/../misc/funzioni.php";
	$soci = getSoci(); 
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
		<h2>Elimina un socio</h2>
		<form name=formGestioneSoci action="../check/controlloGestioneSoci.php" method=POST >
			<input type=hidden name=user value="<?php echo $user; ?>" />
			<div>
				<label for=utenteElimina>Seleziona l'utente da eliminare:</label>
				<select name=utente id=utenteElimina>
					<?php
						foreach($soci as $chiave => $valore){
							echo "<option value=\"$valore\">$valore</option>";
						}
					?>
				</select>
			</div>
			<input type=submit name=elimina value=elimina />
		</form>

		<div id=footer>
			<a href="../aree/gestisciSoci.php?user=<?php echo $user; ?>">TORNA ALLA GESTIONE SOCI</a> 
		</div>

		<?php
			if(isset($_GET['successo'])){
				if($_GET['successo'] == 1){
					echo "<p style='color: green;'>Socio eliminato correttamente</p>";
				} elseif($_GET['successo'] == 0){
					echo "<p style='color: red;'>Errore: nessun socio selezionato o socio non trovato</p>";
				}
			}
		?>
	</body>
</html>