<?php
	session_start();
	
	require "../../common/connection.php";
	
	$data = $_GET['data'];
	$ora = $_GET['ora'];
	$sala = $_GET['sala'];
	$dip = $_GET['dip'];
	
	//$dipU = $_GET['dipU'];
	$ruoloU = $_GET['ruoloU'];
	
	$query = "SELECT lavoratore.email, lavoratore.nome_dipartimento, lavoratore.ruolo, dipartimento.nome FROM lavoratore LEFT JOIN dipartimento ON lavoratore.email = dipartimento.email_dirigente WHERE lavoratore.email NOT IN (SELECT email_partecipante FROM assegnato WHERE data_riunione = '$data' AND ora_riunione = '$ora' AND nome_sala_riunione = '$sala' AND nome_dipartimento_sala_riunione = '$dip')";
    $res= $cid->query($query);
    if (!$res) {
        header('Location: ../../frontend/gestioneR.php?status=ko');
        }
    else {
		//Operazione correttamente eseguita.
        }
		
	echo '<p>Aggiungi lavoratori (non precedentemente invitati):</p>
            <select autocomplete="off" type="text" class="form-control" placeholder="Utenti disponibili..." name="emailI">';
			
	if ($ruoloU == "") {
		while($row = mysqli_fetch_array($res)) {
			if (isset($row[1])) {
				echo '<option value='.$row[0].'>'.$row[0].' - ruolo: '.$row[2].' - dip: '.$row[1].'</option>';
				}
			else {
				echo '<option value='.$row[0].'>'.$row[0].' - ruolo: '.$row[2].' - dip: '.$row[3].'</option>';
				}
			}
		}
	else {
		while($row = mysqli_fetch_array($res)) {
			if (isset($row[1])) {
				if ($row[2] == $ruoloU) {
					echo '<option value='.$row[0].'>'.$row[0].' - ruolo: '.$row[2].' - dip: '.$row[1].'</option>';
					}
				}
			else {
				if ($row[2] == $ruoloU) {
					echo '<option value='.$row[0].'>'.$row[0].' - ruolo: '.$row[2].' - dip: '.$row[3].'</option>';
					}
				}
			}
		}
		
	echo '</select>
		<button style="position:relative; top:10px" class="btn-solid-reg" type="submit"><u>INVITA</u></button>';
	
	?>