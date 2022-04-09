<?php


    require "../../common/connection.php";
	
	$data = $_GET['data'];
	$ora = $_GET['ora'];
	$sala = $_GET['sala'];
	$dip = $_GET['dip'];

    $queryingiustificato = "UPDATE assegnato SET data_conferma_presenza_assenza = CURDATE() - INTERVAL 1 DAY, motivazione_assenza = 'Assenza ingiustificata' WHERE data_conferma_presenza_assenza IS NULL AND motivazione_assenza IS NULL AND data_riunione <= CURDATE()";
    $resingiustificato= $cid->query($queryingiustificato);
    if (!$resingiustificato) {
        header('Location: ../../frontend/gestioneR.php?status=ko');
        }
    else {
		//Operazione correttamente eseguita.
        }

    $query = "SELECT * FROM assegnato WHERE data_riunione = '$data' AND ora_riunione = '$ora' AND nome_sala_riunione = '$sala' AND nome_dipartimento_sala_riunione = '$dip' AND data_conferma_presenza_assenza IS NOT NULL AND motivazione_assenza IS NULL";
    $res= $cid->query($query);
    if (!$res) {
        header('Location: ../../frontend/gestioneR.php?status=ko');
        }
    else {
		//Operazione correttamente eseguita.
        }
	
    echo'<div class="container">
    <div class="row">
        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
        <div id="vecchiinvitati">
        </div>
        <div class="col-lg-4">
            <h3>Lavoratori invitati alla riunione:</h3>
            <hr>
            <div class="row">
                <div class="col">
                    <h6>Partecipanti:</h6>
                    <div style="height: 200px; overflow: auto">
                    <ul>';
                    while($row = mysqli_fetch_array($res)) {
                        if (isset($row[5])) {
                            echo '<li style="color:green;">'.$row[4].' (confermato in data: '.$row[5].')
                                </li>';
                            }
                        }
                    echo'</ul>
                    </div>
                    </select>
                </div>
            </div>
        </div>
        <!-- end of col -->';
        $query = "SELECT * FROM assegnato WHERE data_riunione = '$data' AND ora_riunione = '$ora' AND nome_sala_riunione = '$sala' AND nome_dipartimento_sala_riunione = '$dip' AND data_conferma_presenza_assenza IS NOT NULL AND motivazione_assenza IS NOT NULL";
    $res= $cid->query($query);
    if (!$res) {
        header('Location: ../../frontend/gestioneR.php?status=ko');
        }
    else {
		//Operazione correttamente eseguita.
        }
        echo '<div class="col-lg-4">
            <h6 style="position:relative; top:10px"><br><br><br><br>Assenti:</h6>
            <div style="height: 200px; overflow: auto">
            <ul style="position:relative; top:10px">';
            while($row = mysqli_fetch_array($res)) {
                if (isset($row[6])) {
                    echo '<li style="color:red;">
                            <div id="text">'.$row[4].' (in data: '.$row[5].' rifiutato: '.$row[6].')</div>
                        </li>';
                    }
                }
            echo'</ul>
            </div>
        </div>
        <!-- end of col -->
    </div>
    <!-- end of row -->
    <div class="row">
        <a class="btn-outline-reg mfp-close as-button" href="#screenshots">INDIETRO</a>
    </div>
    </div>
    <!-- end of container -->';

?>