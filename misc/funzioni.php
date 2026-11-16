<?php	

	function errs($err) {
		echo "<p class=scaduto >"; // uso class scaduto perchè cambia solo il testo a rosso :P, spero che non confodiate
		switch($err) {
			case 101:
				echo "Credenziali errate";
				break;
			case 102:
				echo "Errore di accesso";
				break;
			case 103: // per segreteria e admin
				echo "Password non corrispondono";
				break;
			case 104: // per segreteria e admin
				echo "Password troppo corta";
				break;
			case 201:
				echo "Socio non trovato/selezionato";
				break;
			case 202:
				echo "Data inizio non valida o mancante";
				break;
			case 203:
				echo "Tipo di abbonamento non scelto";
				break;
			case 301:
				echo "Corso completo (posti massimi raggiunti)";
				break;
			case 302:
				echo "Socio già iscritto a questo corso";
				break;
			case 303:
				echo "Certificato medico/abbonamento scaduto";
				break;
			case 304:
				echo "Corso già esistente";
				break;
			case 401: // non dovrebbe mai succedere, preghiamo 🙏🏽
				echo "Impossibile accedere al file di dati";
				break;
			case 402:
				echo "Nessuna scadenza rivelata nei prossimi 30 giorni";
				break;
			case 501: 
				echo "Accesso negato"; 
				break;
				/* ho notato che ci siamo dimenticati di fare il controllo dei ruoli
				quindi dobbiamo ricordarci poi di implementare il controlle dei ruoli, così soci non vanno a 
				toccare dove non dovrebbero toccare */
			default:
				echo "Errore anomalo";
				break;
		} 
		echo "</p>";
	}

	function redirectaSegretario($redirect, $user){
		if($redirect == "inserisciSocio"){
			header("location: ../aree/inserisciSocio.php?user=$user"); 
			die();
		}
		if($redirect == "eliminaSocio"){
			header("location: ../aree/eliminaSocio.php?user=$user");
			die();
		}
		if($redirect == "scadenzaCM"){
			header("location: ../aree/scadenzaCMeAB.php?user=$user");
			die();
		}
		if($redirect == "aggiorna"){
			header("location: ../aree/aggiornaCFeAB.php?user=$user");
			die();
		}
	}

	// sarà da fare una funzione getUtenti, vedi un po' te, sennò vedo di farla io

    function getRuolo($user, $pass){
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
			if($app[0] == $user && $app[1] == $pass){
				$ruolo = $app[2];
				fclose($file);
				return $ruolo;
			}
		}
		fclose($file);
		return -1;
	}

    function getAbbonamento($user) {
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
			if($app[0] == $user){
				$abbonamento = $app[1];
				fclose($file);
				return $abbonamento;
			}
		}
    }

    function getCertMed($user) {
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
			if($app[0] == $user){
				$certmed = $app[2];
				fclose($file);
				return $certmed;
			}
		}
    }

	function getUtenti(){
		$file = fopen(__DIR__ . "/../data/utenti.php","r") or die("Errore nell'apertura del file");
		$utenti = array();
		fgets($file); //salta il die
		fgets($file); //salta intestazione record
		while($riga = trim(fgets($file))){
			$app = explode("|", $riga);
			$utenti[] = $app[0];
		}
		fclose($file);
		return $utenti;
	}
	
	function getSoci(){
		$file = fopen(__DIR__ . "/../data/utenti.php", "r") or die("Errore nell'apertura del file");
		$soci = array();
		fgets($file); // salta il die
		fgets($file); // salta intestazione record
		while($riga = trim(fgets($file))){
			$app = explode("|", $riga);
			if(isset($app[2]) && trim($app[2]) == "3"){
				$soci[] = $app[0];
			}
		}
		
		fclose($file);
		return $soci;
	}

	function esisteUtente($nomeUtente){
		$file = fopen(__DIR__ . "/../data/utenti.php", "r") or die("Errore nell'apertura del file");
		fgets($file); // salta il die
		fgets($file); // salta intestazione record
		while($riga = trim(fgets($file))){
			$app = explode("|", $riga);
			if(trim($app[0]) == trim($nomeUtente)){
				fclose($file);
				return true;
			}
		}
		fclose($file);
		return false;
	}

	function inserisciUtente($nomeUtente, $password, $ruolo){
		if(esisteUtente($nomeUtente)){
			return false;
		}
		$file = fopen(__DIR__ . "/../data/utenti.php", "a") or die("Errore nell'apertura del file");
		$passHash = md5($password);
		//utente|password|ruolo
		$riga = "\n" . trim($nomeUtente) . "|" . $passHash . "|" . trim($ruolo);
		fwrite($file, $riga);
		fclose($file);
		return true;
	}
	
	function eliminaSocio($nomeSocio){
		if(!esisteUtente($nomeSocio)){
			return false;
		}
		
		$file = fopen(__DIR__ . "/../data/utenti.php", "r") or die("Errore nell'apertura del file");
		$righe = array();
		$trovato = false;
		$righe[] = trim(fgets($file)); // salva il die
		$righe[] = trim(fgets($file)); // salva intestazione record
		while($riga = trim(fgets($file))){
			$app = explode("|", $riga);
			if($app[0] == $nomeSocio && $app[2] == "3"){
				$trovato = true;
			} else {
				$righe[] = $riga;
			}
		}
		fclose($file);
		
		if($trovato){
			$file = fopen(__DIR__ . "/../data/utenti.php", "w") or die("Errore nell'apertura del file");
			fwrite($file, implode("\n", $righe));
			fclose($file);
			return true;
		}
		
		return false;
	}
	
	function aggiornaCFeAB($nomeSocio, $dataAbb, $dataCM){
		$percorso = __DIR__ . "/../data/abbonamentiCertificati.php";
		$file = fopen($percorso, "r") or die("Errore nell'apertura del file");
		
		$righe = array();
		$trovato = false;
		
		$righe[] = trim(fgets($file)); // salva il die
		$righe[] = trim(fgets($file)); // salva intestazione record
		
		while($riga = trim(fgets($file))){
			$app = explode("|", $riga);
			if($app[0] == $nomeSocio){
				$trovato = true;
				$abb = ($dataAbb != "") ? strtotime($dataAbb) : $app[1];
				$cm = ($dataCM != "") ? strtotime($dataCM) : $app[2];
				$righe[] = "$nomeSocio|$abb|$cm";
			} else {
				$righe[] = $riga;
			}
		}
		fclose($file);
		
		if(!$trovato){
			$abb = ($dataAbb != "") ? strtotime($dataAbb) : 0;
			$cm = ($dataCM != "") ? strtotime($dataCM) : 0;
			$righe[] = "$nomeSocio|$abb|$cm";
		}
		
		$file = fopen($percorso, "w") or die("Errore nell'apertura del file");
		fwrite($file, implode("\n", $righe));
		fclose($file);
	}

	function getIstruttori(){
		$file = fopen(__DIR__ . "/../data/utenti.php", "r") or die("Errore nell'apertura del file");
		$istruttori = array();
		fgets($file); // salta il die
		fgets($file); // salta intestazione record
		while($riga = trim(fgets($file))){
			$app = explode("|", $riga);
			if(isset($app[2]) && trim($app[2]) == "2"){
				$istruttori[] = $app[0];
			}
		}
		
		fclose($file);
		return $istruttori;
	}

	function esisteCorso($nomeCorso){
		$file = fopen(__DIR__ . "/../data/corsi.php", "r") or die("Errore nell'apertura del file");
		fgets($file); // salta il die
		fgets($file); // salta intestazione record
		while($riga = trim(fgets($file))){
			$app = explode("|", $riga);
			if(trim($app[1]) == trim($nomeCorso)){
				fclose($file);
				return true;
			}
		}
		fclose($file);
		return false;
	}

	function inserisciCorso($istruttore, $nomeCorso, $dataCorso, $durataCorso ){
		if(esisteCorso($nomeCorso)){
			return false;
		}
		$file = fopen(__DIR__ . "/../data/corsi.php", "a") or die("Errore nell'apertura del file");
		//istruttore|nome|data|durata
		$riga = "\n" . trim($istruttore) . "|" . trim($nomeCorso) . "|" . trim($dataCorso) . "|" . trim($durataCorso);
		fwrite($file, $riga);
		fclose($file);
		return true;
	}
?>