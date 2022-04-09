<?php
	session_start();

    require "../../common/connection.php";

    $vecchiaora = $_SESSION['oramodificare'];
    $vecchiadata = $_SESSION['datamodificare'];
    $vecchiasala = $_SESSION['salamodificare'];
    $vecchiodipartimento = $_SESSION['dipartimentomodificare'];
    $nuovotema = $_POST['tema1'];
    $nuovadurata = $_POST['durata1'];
    $nuovaora = $_POST['ora1'];
    $nuovadata = $_POST['data1'];
    $nuovasala = $_SESSION["salaScelta"];
    $nuovodipartimento = $_POST['dipartimento1'];

    $querymodificariunione = "UPDATE riunione SET durata = '$nuovadurata', data = '$nuovadata', ora = '$nuovaora', nome_sala = '$nuovasala', nome_dipartimento_sala = '$nuovodipartimento', tema = '$nuovotema' WHERE data = '$vecchiadata' AND ora = '$vecchiaora' AND nome_sala = '$vecchiasala' AND nome_dipartimento_sala = '$vecchiodipartimento'";
	$resriunionemod = $cid->query($querymodificariunione);

    if (!$resriunionemod) {
        unset($_SESSION['salamodificare']);
        unset($_SESSION['dipartimentomodificare']);
        unset($_SESSION['oramodificare']);
        unset($_SESSION['datamodificare']);
		header('Location: ../../frontend/gestioneR.php?status=ko');
		} else {
        unset($_SESSION['salamodificare']);
        unset($_SESSION['dipartimentomodificare']);
        unset($_SESSION['oramodificare']);
        unset($_SESSION['datamodificare']);
		header('Location: ../../frontend/gestioneR.php?status=ok');
	}
	
	?>