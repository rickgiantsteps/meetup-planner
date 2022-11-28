<?php
	// Start the session
	session_start();
	
	require "../../common/connection.php";

	$email = $_SESSION["email"];
	
	$data = $_SESSION["data"];
	$ora = $_SESSION["ora"];
	$sala = $_SESSION["sala"];
	$dip = $_SESSION["dip"];
	
	$dataOggi = date("Y-m-d");
	
	$queryinv = "SELECT * FROM assegnato WHERE data_riunione='$data' AND ora_riunione='$ora' AND email_partecipante='$email' AND data_conferma_presenza_assenza IS NOT NULL AND motivazione_assenza IS NULL";
	$resinv = $cid->query($queryinv);
	if (!$resinv) {
		header('Location: inviti.php?status=ko');
		}
	else {
		//Operazione correttamente eseguita.
		}
	$rowinv = mysqli_fetch_array($resinv);
	
	if (isset($rowinv) && !isset($_POST["giustifica"])) {
		header('Location: ../../frontend/inviti.php?status=negaAccetta');
		}
	else {
		if (isset($_POST["giustifica"])) {
			$giustifica = $_POST["giustifica"];
		
			$query = "UPDATE assegnato SET data_conferma_presenza_assenza='$dataOggi', motivazione_assenza='$giustifica' WHERE data_riunione='$data' AND ora_riunione='$ora' AND nome_sala_riunione='$sala' AND nome_dipartimento_sala_riunione='$dip' AND email_partecipante='$email'";
			}
		else {
			$query = "UPDATE assegnato SET data_conferma_presenza_assenza='$dataOggi', motivazione_assenza=NULL WHERE data_riunione='$data' AND ora_riunione='$ora' AND nome_sala_riunione='$sala' AND nome_dipartimento_sala_riunione='$dip' AND email_partecipante='$email'";
			}
			
		$res= $cid->query($query);
		
		if (!$res) {
			header('Location: ../../frontend/inviti.php?status=ko');
			}
		else {
			header('Location: ../../frontend/inviti.php?status=ok');
			}
		}
	
	unset($res);
	unset($resinv);
	?>