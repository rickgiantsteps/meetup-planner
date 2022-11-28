<?php
	// Start the session
	session_start();
	
	require "../../common/connection.php";
	
	if ($_GET['dip'] == "") {
		$dip = "IS NOT NULL";
		}
	else {
		$dip = "= '".$_GET['dip']."'";
		}
    
    if ($_GET['date'] == "") {
		$date = "<= CURRENT_DATE()";
		}
	else {
		$date = "= '".$_GET['date']."'";
		}

      if ($_GET['anno'] == "") {
         $anno = '<= '.date("Y").'';
         }
      else {
         $anno = "= ".$_GET['anno']."";
         }

         if ($_GET['settimana'] == "") {
            $settimana = "IS NOT NULL";
            }
            elseif (substr($_GET['settimana'], 0, 4)!=substr($anno, 2)){
               $settimana = "IS NULL";
            }
         else {
            $settimana = "= '".substr($anno, 2)."".substr($_GET['settimana'], -2)."'";
            }

    if ($_GET['mese'] == "") {
		$mese = "IS NOT NULL";
		}
      elseif (substr($_GET['mese'], 0, 4)!=substr($anno, 2)){
         $mese = "IS NULL";
      }
	else {
		$mese = "= '".substr($_GET['mese'], 5)."'";
		}

        //echo "DEBUG: SELECT * FROM riunione WHERE data ".$date." AND nome_dipartimento_sala ".$dip." AND YEAR(data) ".$anno." AND MONTH(data) ".$mese." AND YEARWEEK(data) ".$settimana."";
		
		if ($dip != "IS NOT NULL") {
			$query = "SELECT count(*) FROM riunione WHERE data ".$date." AND nome_dipartimento_sala ".$dip."";
			$res= $cid->query($query);
			if (!$res) {
				header('Location: gestioneR.php?status=ko');
				}
			else {
				//Operazione correttamente eseguita.
				}
			
			$row = mysqli_fetch_array($res);
			
			echo 'Il numero di riunioni pianificate per il diparimento scelto è: <u>'.$row[0].'</u>.<br>';
			unset($res);
			unset($row);
			}

        $query = "SELECT * FROM riunione WHERE data ".$date." AND nome_dipartimento_sala ".$dip." AND YEAR(data) ".$anno." AND MONTH(data) ".$mese." AND YEARWEEK(data) ".$settimana."";
        $res= $cid->query($query);
        if (!$res) {
            header('Location: gestioneR.php?status=ko');
                    }
        else {
            //Operazione correttamente eseguita.
        }

        echo 'Sei in <u>modalità visualizza</u>! Per effettuare azioni sulle riunioni clicca <button class="btn-solid-reg" onClick="window.location.reload();">REFRESH DATI</button>
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
        
            $counter = -1;
            while($row = mysqli_fetch_array($res)) {
                $counter = $counter + 1;
               echo
                             '<tr>
                                 <td class="text-center" style="overflow: auto" id="data'.strval($counter).'">'.$row[0].'</td>';

                                 $querylav = "SELECT nome, cognome FROM lavoratore WHERE '$row[6]' = email";
                                 $reslav= $cid->query($querylav);
                     if (!$reslav) {
                        header('Location: ../../frontend/gestioneR.php?status=ko');
                        }
                     else {
                        //Operazione correttamente eseguita.
                        }
                                 $rowlav = mysqli_fetch_array($reslav);

                                 echo '<td style="overflow: auto">'.$rowlav[0].' '.$rowlav[1].'</td>
                                 <td style="overflow: auto">'.$row[6].'</td>
                                 <td style="overflow: auto" id="ora'.strval($counter).'">'.$row[1].'</td>
                                 <td style="overflow: auto" id="durata'.strval($counter).'">'.$row[4].' minuti</td>
                                 <td style="overflow: auto" id="sala'.strval($counter).'">'.$row[2].'</td>
                                 <td style="overflow: auto" id="dip'.strval($counter).'">'.$row[3].'</td>
                                 <td id="tema'.strval($counter).'" style="overflow: auto">'.$row[5].'</td>
               </tr>';

            }
            echo '</tbody>
            </table>';
    
        unset($res); //istruzione x liberare le risorse allocate.
        ?>