<?php 
	if(!isset($_GET['user'])) {
		header("location: ../login/login.php?err=102");
		die();
	}

	require_once __DIR__ . "/../misc/funzioni.php";
	
	$soci = getSoci(); 
	$socioSelezionato = isset($_GET['socio']) ? $_GET['socio'] : "";
	$user = $_GET["user"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Controllo Scadenze</title>
		<link rel=stylesheet href="../misc/style.css" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../misc/icon.png" type="image/jpeg">
	</head>
	<body>
		<form name=formSegretario action="../check/controlloScadenzaCFeAB.php" method=post >
			<h2>Controlla le varie scadenze</h2>
			<input type=hidden name=user value="<?php echo $user; ?>" />
			<?php if(isset($_GET['err'])) errs($_GET['err']); ?>
			<div>
				<label for=utenteControlla>Seleziona il socio da controllare:</label>
				<select name=utente id=utenteControlla>
					<?php
						foreach($soci as $chiave => $valore){
							$selected = ($valore == $socioSelezionato) ? "selected" : "";
							echo "<option value=\"$valore\" $selected>$valore</option>";
						}
					?>
				</select>
			</div>
			<div>
				<input type=submit name=controlla value=controllo <?php echo empty($soci) ? "disabled" : "" ?>/>
			</div>
		</form>

		<?php
			// Se è stato selezionato un socio dal controllo, mostra le sue scadenze
			if($socioSelezionato != ""){
				$oggi = time();
				$dataAbb = getAbbonamento($socioSelezionato);
				$dataCM = getCertMed($socioSelezionato);
				$diffAbb = ($dataAbb - $oggi);
				$diffCM = ($dataCM - $oggi);
		?>
			<h3>Situazione di: <?php echo $socioSelezionato; ?></h3>
			<div id=table-container>
				<div id=table-abb>
					<table>
						<tr>
							<th>Scadenza Abbonamento</th>
						</tr>
						<tr>
							<?php
								if($dataAbb != null){
									$data = date('Y-m-d', (int) $dataAbb);
									if($diffAbb <= 0) {
										echo "<th class=scaduto>$data</th>";
									} elseif($diffAbb <= 604800 && $diffAbb > 0) {
										echo "<th class=quasi-scaduto>$data</th>";
									} else {
										echo "<th class=valido>$data</th>";
									}
								} else {
									echo "<th class=scaduto>Nessun abbonamento registrato</th>";
								}
							?>
						</tr>
					</table>
				</div>

				<div id=table-cm>
					<table>
						<tr>
							<th>Scadenza Certificato Medico</th>
						</tr>
						<tr>
							<?php
								if($dataCM != null){
									$data = date('Y-m-d', (int) $dataCM);
									if($diffCM <= 0) {
										echo "<th class=scaduto>$data</th>";
									} elseif($diffCM <= 604800 && $diffCM > 0) {
										echo "<th class=quasi-scaduto>$data</th>";
									} else {
										echo "<th class=valido>$data</th>";
									}
								} else {
									echo "<th class=scaduto>Nessun certificato registrato</th>";
								}
							?>
						</tr>
					</table>
				</div>
			</div>
		<?php
			}
		?>
		<div id=footer>
			<a href="../aree/gestisciSoci.php?user=<?php echo $user; ?>">Torna alla gestione soci</a> 
			<a href="../login/login.php">Log Out</a>
		</div>
	</body>
</html>