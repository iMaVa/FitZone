<?php
if(!isset($_GET['user'])) header("location: /../login/login.php?err=102");
require_once __DIR__ . "/../misc/funzioni.php";
$oggi = time();
$dataAbb = getAbbonamento($_GET['user']);
$dataCM = getCertMed($_GET['user']);
$diffAbb = ($dataAbb - $oggi);
$diffCM = ($dataCM - $oggi);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home - Socio</title>
		<link rel=stylesheet href="../misc/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	
	<body>
		<h1>Benvenuto <?php echo $_GET['user']; ?></h1>
		<div id=table-container >

			<div id=table-abb >
				<table>
					<tr>
						<th>Scadenza Abbonamento</th>
					</tr>
					<tr>
						<?php
							$data = date('Y-m-d', (int) $dataAbb);
							if($diffAbb <= 0) {
								echo "<th class=scaduto >";
								echo $data;
							}elseif($diffAbb <= 604800 && $diffAbb > 0) {
								echo "<th class=quasi-scaduto >";
								echo $data;
							}else {
								echo "<th class=valido >";
								echo $data;
							}
							echo "</th>";
						?>
					</tr>
				</table>
			</div>

			<div id=table-cm >
				<table>
					<tr>
						<th>Scadenza Certificato Medico</th>
					</tr>
					<tr>
						<?php
							$data = date('Y-m-d', (int) $dataCM);
							if($diffCM <= 0) {
								echo "<th class=scaduto >";
								echo $data;
							} elseif($diffCM <= 604800 && $diffCM > 0) {
								echo "<th class=quasi-scaduto >";
								echo $data;
							} else {
								echo "<th class=valido >";
								echo $data;
							}
							echo "</th>";
						?>
					</tr>
				</table>
			</div>

			<div id=table-corsi >
				<table>
					<tr>
						<th>Corsi a cui sei iscritto</th>
					</tr>
					<tr>
						<th>Fuck</th> <!-- bisogna chiedere a ceccon come questa merda dovrebbe funzionare... -->
					</tr>
				</table>
			</div>
		</div>

		<div id=footer >
				<a href="../login/login.php">Log Out</a>
				<a href="iscrizioneCorso.php?user=<?php echo $_GET['user'] ?>">Iscriviti a un corso!</a>
		</div>

	</body>
</html>
