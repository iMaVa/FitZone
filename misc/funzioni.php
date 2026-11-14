<?php	
    function getRuolo($nomeUtente, $password){
		$file = fopen(__DIR__ . "/../data/utenti.php","r") or die("Errore nell'apertura del file");
		fgets($file); //salta il die
		fgets($file); //salta intestazione record
		while($riga = trim(fgets($file))){
			$app = explode("|", $riga);
			/*
			$app[0] -> Utente
			$app[1] -> Password
			$app[2] -> ruolo
			*/
			if($app[0] == $nomeUtente && $app[1] == $password){
				$ruolo = $app[2];
				fclose($file);
				return $ruolo;
			}
		}
		fclose($file);
		return -1;
	}

    function getAbbonamento($nomeUtente) {
        $file = fopen(__DIR__ . "/../data/abbonamentiCertificati.php","r") or die("Errore nell'apertura del file");
		fgets($file); //salta il die
		fgets($file); //salta intestazione record
		while($riga = trim(fgets($file))){
			$app = explode("|", $riga);
			/*
			$app[0] -> Utente
			$app[1] -> data Abb
			$app[2] -> data CM
			*/
			if($app[0] == $nomeUtente){
				$abbonamento = $app[1];
				fclose($file);
				return $abbonamento;
			}
		}
    }
?>