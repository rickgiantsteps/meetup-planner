<?php

    require "../common/connection.php";

	$sEmail = $_SESSION["email"];
	
	//AND data_conferma_presenza_assenza IS NULL
    $queryinv = "SELECT * FROM assegnato WHERE data_riunione > CURRENT_DATE() AND '$sEmail' = email_partecipante";
    $resinv = $cid->query($queryinv);
	if (!$resinv) {
		header('Location: inviti.php?status=ko');
		}
	else {
		//Operazione correttamente eseguita.
		}

        $counter = -1;
			
        while($rowinv = mysqli_fetch_array($resinv)) {    
												
            $queryriunione = "SELECT * FROM riunione WHERE data = '$rowinv[0]' AND ora = '$rowinv[1]' AND nome_sala = '$rowinv[2]' AND nome_dipartimento_sala = '$rowinv[3]'";
            $resriunione= $cid->query($queryriunione);
            if (!$resriunione) {
                header('Location: inviti.php?status=ko');
                }
            else {
                //Operazione correttamente eseguita.
                }

            
             while($rowriunione = mysqli_fetch_array($resriunione)) {    
                $counter = $counter + 1;

            echo
            '<tr>
            
                <td style="overflow: auto" class="text-center" id="data'.strval($counter).'">'.$rowriunione[0].'</td>';
            
                $querylav = "SELECT nome, cognome FROM lavoratore WHERE '$rowriunione[6]' = email";
                $reslav= $cid->query($querylav);
                if (!$reslav) {
                    header('Location: inviti.php?status=ko');
                    }
                else {
                    //Operazione correttamente eseguita.
                    }
                $rowlav = mysqli_fetch_array($reslav);

                echo '<td style="overflow: auto">'.$rowlav[0].' '.$rowlav[1].'</td>
                    <td style="overflow: auto">'.$rowriunione[6].'</td>
                    <td style="overflow: auto" id="ora'.strval($counter).'">'.$rowriunione[1].'</td>
                    <td style="overflow: auto" id="durata'.strval($counter).'">'.$rowriunione[4].' minuti</td>
                    <td style="overflow: auto" id="sala'.strval($counter).'">'.$rowriunione[2].'</td>
                    <td style="overflow: auto" id="dip'.strval($counter).'">'.$rowriunione[3].'</td>
                    <td id="tema'.strval($counter).'" style="overflow: auto">'.$rowriunione[5].'</td>
                <td class="td-actions text-center">
                    <button type="button" id="'.strval($counter).'" rel="tooltip" class="btn btn-success btn-just-icon btn-sm popup-with-move-anim" href="#details-lightbox-1" title="accetta" onclick="parametri_invito(this.id)">
                    <i class="material-icons">done</i>
                    </button>
                    <button type="button" id="'.strval($counter).'" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm popup-with-move-anim" href="#details-lightbox-2" title="rifiuta" onclick="parametri_invito(this.id)">
                    <i class="material-icons">close</i>
                    </button>
                </td>
            </tr>';
        }
        }
		
		if ($counter == -1) {
			echo '<p><u>Nessun invito</u> a cui devi ancora rispondere.<br>Gli eventuali inviti vengono visualizzati nella tabella sottostante.</p>';
			}
		
        unset($resinv);
        unset($resriunione);
        unset($reslav);
    

?>