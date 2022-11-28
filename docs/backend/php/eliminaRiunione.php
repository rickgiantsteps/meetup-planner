<?php

	session_start();

    $data = $_SESSION["data"];
	$ora = $_SESSION["ora"];
	$sala = $_SESSION["sala"];
	$dip = $_SESSION["dip"];

    require "../../common/connection.php";

    $query = "DELETE FROM riunione WHERE data='$data' AND ora='$ora' AND nome_sala='$sala' AND nome_dipartimento_sala='$dip'";
	$res= $cid->query($query);

    if (!$res) {
		header('Location: ../../frontend/gestioneR.php?status=ko');
		}
	else {
		header('Location: ../../frontend/gestioneR.php?status=ok&data='.$data);
		}

?>