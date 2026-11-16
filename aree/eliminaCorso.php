<?php
    if(!isset($_GET["user"])){
		header("location: /../login/login.php?err=102");
        die();
	}

	require_once __DIR__ . "/../misc/funzioni.php";

    $user = $_GET['user'];
    $corsi = getCorsi();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Elimina Corso</title>
        <link rel=stylesheet href="../misc/style.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../misc/icon.png" type="image/jpeg">
    </head>
    <body>
        <h1>Elimina un corso</h1>
        <h3>Seleziona un corso da eliminare</h3>
        <form action="../check/controlloEliminaCorso.php" method=POST>
            <input type=hidden name=user value=<?php echo $_GET['user'] ?> />
            <div>
                <label for=listaCorsi>Seleziona dalla lista di corsi: </label>
                <select name=listaCorsi>
                    <?php
                        foreach($corsi as $chiave => $valore) {
                            echo "<option value=\"$valore\">$valore</option>";
                        }
                    ?>
                </select>
            <div>
            <div>
                <input type=submit name=eliminaCorso value=Elimina <?php echo empty($corsi) ? "disabled" : "" ?>/>
            </div>
        </form>
        <?php 
            if(isset($_GET['err'])) errs($_GET['err']);
            if(isset($_GET['ok'])) echo "<p class=valido>Corso eliminato con successo</p>";
        ?>
        <div id=footer>
            <a href="gestisciCorsi.php?user=<?php echo $_GET['user'] ?>">Torna alla gestione dei corsi</a>
            <a href="../login/login.php">Log Out</a>
        </div>
    </body>
</html>