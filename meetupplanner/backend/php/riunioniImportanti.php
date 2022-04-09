<?php
	// Start the session
	session_start();
	
	require "../../common/connection.php";
	
	echo 'Ecco le riunioni a cui hanno partecipato un numero di impiegati che è superiore al numero di impiegati che afferiscono al dipartimento dell’impiegato/dirigente che ha organizzato la riunione.<br>
		Sei in <u>modalità visualizza</u>! (Il filtro, se utilizzato, agisce su <u>tutte</u> le riunioni passate). Per effettuare azioni sulle riunioni clicca <button class="btn-solid-reg" onClick="window.location.reload();">REFRESH DATI</button>
			<table class="table" style="table-layout: fixed; width: 100%; position:relative; top:15px">
			<thead>
				<tr>
					<th style="overflow: auto" class="text-center">Data</th>
					<th style="overflow: auto">Creatore</th>
					<th></th>
					<th style="overflow: auto">Ora</th>
					<th style="overflow: auto">Durata</th>
					<th style="overflow: auto">Sala</th>
					<th style="overflow: auto">Dipartimento</th>
					<th style="overflow: auto">Tema</th>
				</tr>
			</thead>
			<tbody>';
			
	$query = "SELECT nome_dipartimento FROM lavoratore";
    $res= $cid->query($query);
    
	if (!$res) {
        header('Location: gestioneR.php?status=ko');
        }
    else {
		//Operazione correttamente eseguita.
		}
		
	$numPers["Contabilità"] = 1;
	$numPers["Marketing"] = 1;
	$numPers["Produzione"] = 1;
	$numPers["Ricerca"] = 1;
	$numPers["Risorse umane"] = 1;
	
	while($row = mysqli_fetch_array($res)) {
		if ($row[0] == "Contabilità") {
			$numPers["Contabilità"] = $numPers["Contabilità"] + 1;
			}
			
		if ($row[0] == "Marketing") {
			$numPers["Marketing"] = $numPers["Marketing"] + 1;
			}
			
		if ($row[0] == "Produzione") {
			$numPers["Produzione"] = $numPers["Produzione"] + 1;
			}
			
		if ($row[0] == "Ricerca") {
			$numPers["Ricerca"] = $numPers["Ricerca"] + 1;
			}
			
		if ($row[0] == "Risorse umane") {
			$numPers["Risorse umane"] = $numPers["Risorse umane"] + 1;
			}
		}
		
	unset($res);
	
	$query = "SELECT * FROM riunione WHERE data < CURRENT_DATE()";
	$res= $cid->query($query);
    
	if (!$res) {
        header('Location: gestioneR.php?status=ko&e=1');
        }
    else {
		//Operazione correttamente eseguita.
		}
		
	while($row = mysqli_fetch_array($res)) {
		$queryP = "SELECT count(*) FROM assegnato WHERE data_riunione='$row[0]' AND ora_riunione='$row[1]' AND nome_sala_riunione='$row[2]' AND nome_dipartimento_sala_riunione='$row[3]' AND data_conferma_presenza_assenza IS NOT NULL AND motivazione_assenza IS NULL";
		$resP = $cid->query($queryP);
    
		if (!$resP) {
			header('Location: gestioneR.php?status=ko&e=2');
			}
		else {
			//Operazione correttamente eseguita.
			}
			
		$rowP = mysqli_fetch_array($resP);
		
		$queryU = "SELECT ruolo, nome_dipartimento, nome, cognome FROM lavoratore WHERE email='$row[6]'";
		$resU = $cid->query($queryU);
		
		if (!$resU) {
			header('Location: gestioneR.php?status=ko&e=3');
			}
		else {
			//Operazione correttamente eseguita.
			}
			
		$rowU = mysqli_fetch_array($resU);
		
		if ($rowU[0] != "Direttore") {
			$dipLav = $rowU[1];
		}
		else {
			$queryRuolo = "SELECT nome FROM dipartimento WHERE email_dirigente='$row[6]'";
			$resRuolo = $cid->query($queryRuolo);
		
			if (!$resRuolo) {
				header('Location: gestioneR.php?status=ko&e=4');
				}
			else {
				//Operazione correttamente eseguita.
				}
				
			$rowRuolo = mysqli_fetch_array($resRuolo);
			$dipLav = $rowRuolo[0];
			}
			
		//echo "<br>DEBUG: Num. partecipanti in data ".$row[0]." in dip: ".$row[3].": ".$rowP[0]." - num. lavoratori di ".$dipLav.": ".$numPers[$dipLav];
			
		if ($rowP[0] > $numPers[$dipLav]) {
			echo '<tr>
					<td class="text-center" style="overflow: auto" id="data">'.$row[0].'</td>
					<td style="overflow: auto">'.$rowU[2].' '.$rowU[3].'</td>
                    <td style="overflow: auto">'.$row[6].'</td>
                    <td style="overflow: auto" id="ora">'.$row[1].'</td>
                    <td style="overflow: auto" id="durata">'.$row[4].' minuti</td>
                    <td style="overflow: auto" id="sala">'.$row[2].'</td>
                    <td style="overflow: auto" id="dip">'.$row[3].'</td>
                    <td id="tema" style="overflow: auto">'.$row[5].'</td>
				</tr>';
			}
		}
	
	echo '</tbody>
			</table>';
			
	?>