<?php
	$email = $_POST["email"];
	$userpassword = $_POST["password"];
	$userpasswordmd5 = md5($userpassword);
	
	require "../../common/connection.php";
	
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
		$_SESSION["autorizzazione"]=$row[10];
		header('Location: ../../frontend/lavoratore.php');
		}
	else {
		header('Location: ../../frontend/log-in.php?status=ko');
		}
	unset($res); //  istruzione x liberare le risorse allocate
	?>