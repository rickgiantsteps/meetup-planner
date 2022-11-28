<?php
	// Start the session
	session_start();

	$email = $_SESSION["email"];
	
	require "../../common/connection.php";
	
	$query = "SELECT * FROM lavoratore WHERE email='$email'";
	$res= $cid->query($query);
	$row = $res->fetch_row();

	if (!$_POST["nome"]=='') {
		$nome = $_POST["nome"];
	} else {
		$nome = $row[1];
	}

	if (!$_POST["cognome"]=='') {
		$cognome = $_POST["cognome"];
	} else {
		$cognome = $row[2];
	}

	if (!$_POST["dataN"]=='') {
		$dataN = $_POST["dataN"];
	} else {
		$dataN = $row[3];
	}

	if ($_FILES["foto"]["error"] == 4) {
		$foto = 0;
	} else {
		$foto = addslashes(file_get_contents($_FILES["foto"]['tmp_name']));
	}

	$ruolo = $_POST["ruolo"];

	if ((!$_POST["password"]=='' or !$_POST["confermapassword"]=='') and $_POST["password"]===$_POST["confermapassword"]) {
		$userpassword = md5($_POST["password"]);
	} else {
		$userpassword = $row[11];
	}
	
	if ($foto == 0) {
		$query1 = "UPDATE lavoratore SET nome='$nome', cognome='$cognome', data_di_nascita='$dataN', ruolo='$ruolo', user_password='$userpassword' WHERE email='$email'";
		$res1= $cid->query($query1);
	} else {
		$query1 = "UPDATE lavoratore SET nome='$nome', cognome='$cognome', data_di_nascita='$dataN', foto='$foto', ruolo='$ruolo', user_password='$userpassword' WHERE email='$email'";
		$res1= $cid->query($query1);
	}


	if (!$res1) {
		header('Location: ../../frontend/lavoratore.php?status=ko');
		}
	else {
		$_SESSION["nome"]=$nome." ".$cognome;
		header('Location: ../../frontend/lavoratore.php?status=ok');
		}

	unset($res); //istruzione x liberare le risorse allocate.
	?>