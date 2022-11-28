<?php

    session_start();

    $_SESSION['ideliminariunione'] = $_GET['num'];

    $data = $_GET['data'];
	$ora = $_GET['ora'];
	$sala = $_GET['sala'];
	$dip = $_GET['dip']; 
    $tema = $_GET['tema'];
	$durata = $_GET['durata'];
    
	$_SESSION["data"] = $data;
	$_SESSION["ora"] = $ora;
	$_SESSION["sala"] = $sala;
	$_SESSION["dip"] = $dip;
	$_SESSION["durata"] = $durata;
	
echo '<ul>
        <li>
        Data e ora: '.$data.'|'.$ora.'
        </li>
        <li>
        Dipartimento: '.$dip.'
        </li>
        <li>
        Sala: '.$sala.'
        </li>
        <li>
        Tema: '.$tema.'
        </li>
		<li>
		Durata: '.$durata.'
		</li>
    </ul>';

?>