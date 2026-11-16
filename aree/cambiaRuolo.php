<?php
	if(!isset($_GET["user"])){
		header("location: ../login/login.php?err=102");
		die();
	}
	
	$user = $_GET["user"];
	require_once __DIR__ . "/../misc/funzioni.php";
	$utenti = getUtenti(); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gestione Ruolo - Admin</title>
		<link rel=stylesheet href="../misc/style.css" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../misc/icon.png" type="image/jpeg">
	</head>
	<body>
		<h1>Effettua il cambio del ruolo un socio</h1>
		<form name=formGestioneSoci action="../check/effettuaCambioRuolo.php" method=POST >
			<input type=hidden name=user value="<?php echo $user; ?>" />
			<div>
				<label for=cambia>Seleziona l'utente a cui vuoi cambiare il ruolo:</label>
				<select name=utente id=cambia>
					<?php
						foreach($utenti as $chiave => $valore){
							$ruoloAttuale = getRuoloUtente($valore);
							echo "<option value=\"$valore\">$valore ($ruoloAttuale)</option>";
						}
					?>
				</select>
			</div>
			<h3>Scegli che ruolo nuovo impostare</h3>
			<div>
				<input type=radio name=scelta value=admin id=admin checked />
				<label for=admin>Admin</label>
			</div>
			<div>
				<input type=radio name=scelta value=segretario id=segretario />
				<label for=segretario>Segretario</label>
			</div>
			<div>
				<input type=radio name=scelta value=istruttore id=istruttore />
				<label for=istruttore>Istruttore</label>
			</div>
			<div>
				<input type=radio name=scelta value=socio id=socio />
				<label for=socio>Socio</label>
			</div>
			
			<input type=submit name=aggiorna value=aggiorna />
		</form>

		<div id=footer>
			<a href="../aree/homeAdmin.php?user=<?php echo $user; ?>">Torna alla Admin Home</a> 
			<a href="../login/login.php">Log Out</a>
		</div>

		<?php
			if(isset($_GET['successo'])){
				if($_GET['successo'] == 1){
					echo "<p class=valido>Ruolo aggiornato correttamente</p>";
				} elseif($_GET['successo'] == 0){
					echo "<p class=scaduto>Errore: non è stato possibile aggiornare il tuolo</p>";
				}
			}
		?>
	</body>
</html>