<?php

	require "../common/connection.php";
	
	$query = "SELECT * FROM dipartimento";
	$resdip= $cid->query($query);
	if (!$resdip) {
		header('Location: dipartimenti.php?status=ko');
		}


        if (!isset($_GET["status"])) {
            while($rowdip = mysqli_fetch_array($resdip))
            {	
                $dipupcase = mb_strtoupper($rowdip[0]);
                echo '<div class="card">
                <div class="card-body">
                    <div class="card-title">Via: '.$rowdip[1].'</div>';

                    if (strlen($dipupcase)>7 and !ctype_space(substr($dipupcase, 7, 1))) {
                        echo '<div class="price"><span class="value">'.substr($dipupcase, 0, 6).'-'.substr($dipupcase, 6).'</span></div>';
                    } else {
                        echo '<div class="price"><span class="value">'.$dipupcase.'</span></div>';
                    }

                   echo '<div class="frequency">Email responsabile: '.$rowdip[2].'</div>
                    <div class="divider"></div>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <div class="media-body"><u>Dipendenti:</u></div>
                        </li>';											
                        
                        $query2 = "SELECT email, nome, cognome, ruolo FROM lavoratore where nome_dipartimento = '$rowdip[0]'";
                        $reslav= $cid->query($query2);
                        if (!$reslav) {
                            header('Location: dipartimenti.php?status=ko');
                            }

                            while($rowlav = mysqli_fetch_array($reslav))
                            {
                                if (isset($_SESSION["email"])) {
                                    echo '<li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">'.$rowlav[1].' '.$rowlav[2].' - '.$rowlav[0].' ('.$rowlav[3].')</div>
                                    </li>';
                                } else {
                                    echo '<li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">'.$rowlav[1].' '.$rowlav[2].' - ('.$rowlav[3].')</div>
                                    </li>';
                                }
                    
                            }
                            
                            echo '<li class="media">
                                    <div class="media-body">
                                        <u>Sale:</u>
                                    </div>
                                </li>';

                        $query3 = "SELECT nome, capienza FROM sala where nome_dipartimento = '$rowdip[0]'";
                        $ressala= $cid->query($query3);
                        if (!$ressala) {
                            header('Location: dipartimenti.php?status=ko');
                            }
                            
                            while($rowsala = mysqli_fetch_array($ressala))
                            {
                                echo '<li class="media">
                                            <i class="fas fa-square"></i></i><div class="media-body">'.$rowsala[0].' (capienza '.$rowsala[1].')</div>
                                    </li>';												
                            }

                    echo '</ul>
                    </div>
                    </div>';
            }
        }
        else {
            echo '<p>Errore!</p>';
        }

	
			unset($ressala);
			unset($resdip);
			unset($reslav);


?>