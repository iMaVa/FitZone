<?php 
    if(!isset($_GET['user'])) {
        header("location: /../login/login.php?err=102");
        die();
    }
    
    require_once __DIR__ . "/../misc/funzioni.php";  
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Iscrizione Corso - Socio</title>
        <link rel=stylesheet href="../misc/style.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../misc/icon.png" type="image/jpeg">
    </head>

    <body>
        <h1>Iscrizione corso</h1>
        <h3>Seleziona il corso a cui vuoi iscriverti</h3>
    </body>
</html>