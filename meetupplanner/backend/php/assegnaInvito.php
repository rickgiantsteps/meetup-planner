<?php
	// Start the session
	session_start();
	
	if ($_SESSION["numeromassimoinvitati"]>=$_SESSION["capienza"]) {
		unset($_SESSION["numeromassimoinvitati"]);
		unset($_SESSION["capienza"]);
		header('Location: ../../frontend/gestioneR.php?status=warning');
	} else {
		unset($_SESSION["numeromassimoinvitati"]);
		unset($_SESSION["capienza"]);
		
	

	require "../../common/connection.php";
	
	$emailI = $_POST["emailI"];
	
	$dataR = $_SESSION["data"];
	$ora = $_SESSION["ora"];
	$salaR = $_SESSION["sala2"];
	$dip = $_SESSION["dip"];
	
	$query = "INSERT INTO assegnato (data_riunione, ora_riunione, nome_sala_riunione, nome_dipartimento_sala_riunione, email_partecipante, data_conferma_presenza_assenza, motivazione_assenza) VALUES ('$dataR', '$ora', '$salaR', '$dip', '$emailI', NULL, NULL)";
	$res = $cid->query($query);
	
	if (!$res) {
		unset($_SESSION["data"]);
		unset($_SESSION["ora"]);
		unset($_SESSION["sala2"]);
		unset($_SESSION["dip"]);
        header('Location: ../../frontend/gestioneR.php?status=ko&emailI='.$emailI);
        }
    else {
		unset($_SESSION["data"]);
		unset($_SESSION["ora"]);
		unset($_SESSION["sala2"]);
		unset($_SESSION["dip"]);
		header('Location: ../../frontend/gestioneR.php?status=ok');
        }
	}
	?>