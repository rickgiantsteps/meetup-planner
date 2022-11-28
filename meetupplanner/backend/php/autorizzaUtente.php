<?php
	// Start the session
	session_start();
	
	require "../../common/connection.php";
	
	$dataauth = date('Y-m-d H:i:s');
	$direttore = $_SESSION["email"];
	$emailA = $_SESSION["emailA"];
	
	$query = "UPDATE lavoratore SET dirigente_autorizzante = '$direttore', data_autorizzazione = '$dataauth' WHERE email='$emailA'";
	$res= $cid->query($query);

	if (!$res) {
		header('Location: ../../frontend/lavoratore.php?status=ko');
		}
	else {
		header('Location: ../../frontend/lavoratore.php?status=ok');
		}

	unset($res); //istruzione x liberare le risorse allocate.
	?>