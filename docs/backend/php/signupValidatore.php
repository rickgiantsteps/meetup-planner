<?php
	$nome = $_POST["nome"];
	$cognome = $_POST["cognome"];
	$dataN = $_POST["dataN"];
	$foto = addslashes(file_get_contents($_FILES["foto"]['tmp_name']));
	$ruolo = $_POST["ruolo"];
	$dipartimento = $_POST["dipartimento"];
	$email = $_POST["email"];
	$userpassword = $_POST["password"];
	$userpasswordmd5 = md5($userpassword);
	
	require "../../common/connection.php";
	
	$query = "INSERT INTO lavoratore (email, nome, cognome, data_di_nascita, foto, ruolo, nome_dipartimento, user_password) VALUES ('$email', '$nome', '$cognome', '$dataN', '$foto', '$ruolo', '$dipartimento', '$userpasswordmd5')";
	$res = $cid->query($query);

	if (!$res) {
		header('Location: ../../frontend/sign-up.php?status=ko');
		}
	else {
		$query = "SELECT * FROM lavoratore WHERE email='$email' AND user_password='$userpasswordmd5'";
		$res= $cid->query($query);
		$row = $res->fetch_row();

		if (!$res) {
			header('Location: ../../frontend/log-in.php?status=ko');
			}
		elseif (isset($row)) {
			session_start();
			$_SESSION["email"]=$row[0];
			$_SESSION["nome"]=$row[1]." ".$row[2];
			$_SESSION["ruolo"]=$row[5];
			header('Location: ../../frontend/lavoratore.php');
			}
		else {
			header('Location: ../../frontend/log-in.php?status=ko');
			}
		}

	unset($res); //  istruzione x liberare le risorse allocate
	?>