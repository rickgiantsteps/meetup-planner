<?php
	session_start();
	unset($_SESSION['salaScelta']);
	
	$dataR = $_GET['data'];
	$oraI = $_GET['ora'];
	$durata = $_GET['durata'];
	$dip = $_GET['dip'];
	
	$salaPrec = $_SESSION["sala"];
	$vecchiaora = $_SESSION['oramodificare'];
    $vecchiadata = $_SESSION['datamodificare'];
    $vecchiodipartimento = $_SESSION['dipartimentomodificare'];
	$vecchiadurata = $_SESSION['duratamodificare'];
	
	require "../../common/connection.php";
	
	$oraI = date('H:i:s', strtotime($oraI. ' +0 minutes'));
	$endTime = date('H:i:s', strtotime($oraI. ' +'.$durata.' minutes'));
	
	$queryS = "SELECT sala.nome FROM sala WHERE nome_dipartimento = '$dip' AND nome NOT IN (SELECT nome_sala FROM riunione WHERE (data = '$dataR' AND riunione.ora BETWEEN '$oraI' AND '$endTime') OR (data = '$dataR' AND riunione.ora <= '$oraI' AND TIME(DATE_ADD(TIMESTAMP(riunione.data,riunione.ora), INTERVAL riunione.durata minute)) >= '$oraI'))";
	$resS= $cid->query($queryS);

	if (!$resS) {
		header('Location: ../../frontend/gestioneR.php?status=ko');
		}
	else {
		//Operazione correttamente eseguita.
		}
		
	echo '<select autocomplete="off" class="custom-select input-sm" id="salaDisp2" name="sala" onchange="inviaSala2()" required>
		<option disabled selected>Vedi le sale disponibili...</option>';
		
	$oraV = date('H:i:s', strtotime($vecchiaora. ' +0 minutes'));
	$endTimeV = date('H:i:s', strtotime($vecchiaora. ' +'.$vecchiadurata.' minutes'));
	
	//Permette di selezionare la sala precedentemente scelta per questa riunione.		
	if ($_SESSION["dip"] == $dip && $_SESSION["data"] == $dataR && $oraI >= $oraV && $oraI <= $endTimeV && $endTime <= $endTimeV) {
		echo '<option value="'.$salaPrec.'">'.$salaPrec.'</option>';
		}
	
	while($rowS = mysqli_fetch_array($resS)) {
		echo '<option value="'.$rowS[0].'">'.$rowS[0].'</option>';
		}
		
	echo '</select>';

	//echo 'DEBUG: '.$_GET["sala"];
		
	//unset($resS); //Istruzione x liberare le risorse allocate.
?>