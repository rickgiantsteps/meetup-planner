<?php
	session_start();
	
	require "../../common/connection.php";
	
	$data = $_GET['data'];
	$ora = $_GET['ora'];
	$sala = $_GET['sala'];
	$dip = $_GET['dip'];
	
	$_SESSION["data"] = $data;
	$_SESSION["ora"] = $ora;
	$_SESSION["sala2"] = $sala;
	$_SESSION["dip"] = $dip;

	$queryingiustificato = "UPDATE assegnato SET data_conferma_presenza_assenza = CURDATE() - INTERVAL 1 DAY, motivazione_assenza = 'Assenza ingiustificata' WHERE data_conferma_presenza_assenza IS NULL AND motivazione_assenza IS NULL AND data_riunione <= CURDATE()";
    $resingiustificato= $cid->query($queryingiustificato);
    if (!$resingiustificato) {
        header('Location: ../../frontend/gestioneR.php?status=ko');
        }
    else {
		//Operazione correttamente eseguita.
        }

	
    $query = "SELECT * FROM assegnato WHERE data_riunione = '$data' AND ora_riunione = '$ora' AND nome_sala_riunione = '$sala' AND nome_dipartimento_sala_riunione = '$dip'";
    $res= $cid->query($query);
    if (!$res) {
        header('Location: ../../frontend/gestioneR.php?status=ko');
        }
    else {
		//Operazione correttamente eseguita.
        }
	
	echo '<h6><br><br><br>Invitati:</h6>';
	
	echo '<ul>';
	
	$counter = 0;
	$counterP = 0;
	$counterR = 0;
	
	while($row = mysqli_fetch_array($res)) {
		if (isset($row[6])) {
			$counterR = $counterR + 1;
			echo '<li style="color:red;">
					<div id="text">'.$row[4].' (in data: '.$row[5].' rifiutato: '.$row[6].')</div>
				</li>';
			}
		elseif (isset($row[5])) {
			$counter = $counter + 1;
			$counterP = $counterP + 1;
			echo '<li style="color:green;">'.$row[4].' (confermato in data: '.$row[5].')
				</li>';
			}
		else {
			$counter = $counter + 1;
			echo '<li style="color:grey;">'.$row[4].' (non confermato)
				</li>';
			}
		}
	
	echo '</ul>';
	
	$query = "SELECT capienza FROM sala WHERE nome = '$sala' AND nome_dipartimento = '$dip'";
    $res= $cid->query($query);
    if (!$res) {
        header('Location: ../../frontend/gestioneR.php?status=ko');
        }
    else {
		//Operazione correttamente eseguita.
        }


	$row = mysqli_fetch_array($res);

	
	$_SESSION["numeromassimoinvitati"] = $counter;
	$_SESSION["capienza"] = $row[0];

	
	echo '</div> <!-- end of col -->
            <div class="col">
            <div class="text-container">
            <h6><br><br><br>Numero di invitati:</h6>
            <p>Sono state invitate <u>'.$counter.'</u> persone di cui <u>'.$counterP.'</u> presenti con conferma.</p>
			<p>Hanno rifiutato <u>'.$counterR.'</u> persone.</p>
            <p></p>
            <h6>Capacità della sala:</h6>
            <p>La capacità della sala è <u>'.$row[0].'</u>.</p>
            </div>
            <a class="btn-outline-reg mfp-close as-button" style="position:relative; left:-10px; top:10px" href="#screenshots">INDIETRO</a><br>
            </div>
			</div>
			</form>';
	
	?>