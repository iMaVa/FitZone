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
        <title>Home - Istruttore</title>
        <link rel=stylesheet href="../misc/style.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../misc/icon.png" type="image/jpeg">
    </head>
	<body>
		
			<?php
				if(isset($_GET["user"])){
					$user = $_GET["user"];
					echo "<h1>Benvenuto $user</h1>";
				}
			?>
			
			<div id=footer>
				<a href="../login/login.php">Log Out</a>
			</div>
		<form>
	</body>
</html>
