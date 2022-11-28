<?php
	session_start();

	$salaScelta = $_GET['sala'];
	
	$_SESSION["salaScelta"] = $salaScelta;
	?>