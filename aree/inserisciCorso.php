<?php 
    if(!isset($_GET['user'])) {
		header("location: ../login/login.php?err=102");
		die();
	}

	require_once __DIR__ . "/../misc/funzioni.php";

    $istruttori = getIstruttori();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inserimento Corso - Segreteria</title>
        <link rel=stylesheet href="../misc/style.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../misc/icon.png" type="image/jpeg">
    </head>
    <body>
        <h1>Nuovo corso</h1>
        <h3>Compilare tutti i campi per creare un nuovo corso</h3>
        <form action="../check/controlloInserisciCorso.php" method=POST>
            <input type=hidden name=user value=<?php echo $_GET['user'] ?> />
            <div>
                <label for=listaIstruttori>Seleziona l'istruttore del corso: </label>
                <select name=listaIstruttori>
                    <?php
                        foreach($istruttori as $chiave => $valore) {
                            echo "<option value=\"$valore\">$valore</option>";
                        }
                    ?>
                </select>
            <div>
                <label for=nomeCorso>Inserisci il nome del corso: </label>
                <input type=text name=nomeCorso placeholder="ex: Pilates" required />
            </div>
            <div>
                <label for=dataCorso>Inserisci la data del corso: </label>
                <input type=date name=dataCorso min="<?php echo date("Y-m-d") ?>" value="<?php echo date("Y-m-d"); ?>"  required />
            </div>
            <div>
                <label for=durataCorso>Inserisci la durata del corso: </label>
                <input type=number name=durataCorso min=30 max=120 value=30 required />
            </div>
            <div>
                <input type=submit name=inserisciCorso value=Inserisci />
            </div>
        </form>
        <?php 
            if(isset($_GET['err'])) errs($_GET['err']);
            if(isset($_GET['ok'])) echo "<p class=valido>Corso inserito con successo</p>";
        ?>
        <div id=footer>
            <a href="gestisciCorsi.php?user=<?php echo $_GET['user'] ?>">Torna alla gestione dei corsi</a>
        </div>
    </body>
</html>