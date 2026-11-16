<!-- PLEASE FATE CHE QUESTO LO FACCIA L'ISTRUTTORE PLSPLSPLSPLSPLSPLS INTANTO è SU SEGRETERIA -->
<?php
	if(!isset($_GET["user"])){
		header("location: /../login/login.php?err=102");
        die();
	}

	require_once __DIR__ . "/../misc/funzioni.php";

    $corsi = getCorsi();
?>

<!DOCTYPE html>
<html>
    <head>
		<title>Aggiornamento Corso - Istruttore</title>
		<link rel=stylesheet href="../misc/style.css" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../misc/icon.png" type="image/jpeg">
	</head>
    <body>
        <form action="../check/controlloAggiornaCorso.php" method=POST >
            <h1>Aggiorna corso</h1>
            <h3>Scegliere il corso e la nuova data per il prossimo corso</h3>
            <input type=hidden name=user value=<?php echo $_GET['user'] ?> />
            <div>
                <label for=listaCorsi>Seleziona il corso da aggiornare: </label>
                <select name=listaCorsi>
                    <?php
                        foreach($corsi as $chiave => $valore) {
                            echo "<option value=\"$valore\">$valore</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for=dataCorso>Inserisci la nuova data del corso: </label>
                <input type=date name=nuovaDataCorso min="<?php echo date("Y-m-d") ?>" value="<?php echo date("Y-m-d"); ?>" required />
            </div>
            <div>
                <input type=submit name=aggiornaCorso value=Inserisci />
            </div>
        </form>
        <?php 
            if(isset($_GET['err'])) errs($_GET['err']);
            if(isset($_GET['ok'])) echo "<p class=valido>Corso aggiornato con successo</p>";
        ?>
        <div id=footer>
            <a href="gestisciCorsi.php?user=<?php echo $_GET['user'] ?>">Torna alla gestione dei corsi</a>
        </div>
    </body>
</html>