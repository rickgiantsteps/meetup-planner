<?php
	session_start();
	
    $sala = $_GET['sala'];
	$dataR = $_GET['data'];
	$oraI = $_GET['ora'];
	$durata = $_GET['durata'];
	$dip = $_GET['dip'];

    $_SESSION['salamodificare'] = $sala;
    $_SESSION['dipartimentomodificare'] = $dip;
    $_SESSION['oramodificare'] = $oraI;
    $_SESSION['datamodificare'] = $dataR;
	$_SESSION['duratamodificare'] = $durata;
	
	?>