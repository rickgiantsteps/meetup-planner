<?php

	session_start();

	require "../../common/connection.php";

	$data = $_POST["data"];
	$ora = $_POST["ora"];
	$durata = $_POST["durata"];
	$dipartimento = $_POST["dipartimento"];
	$saladisp = $_SESSION["salaScelta"];
	$tema = $_POST["tema"];
	$creatore = $_SESSION["email"];
	
	$querynewriunione = "INSERT INTO `riunione` (`data`, `ora`, `nome_sala`, `nome_dipartimento_sala`, `durata`, `tema`, `creatore`) VALUES ('$data', '$ora', '$saladisp', '$dipartimento', '$durata', '$tema', '$creatore')";
	$resriunione = $cid->query($querynewriunione);

	if (!$resriunione) {
		header('Location: ../../frontend/gestioneR.php?status=ko&sala='.$saladisp);
		} else {
		unset($_SESSION['salaScelta']);
		header('Location: ../../frontend/gestioneR.php?status=ok');
	}

	unset($resriunione); //  istruzione x liberare le risorse allocate
    
	?>