<?php 
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'meetup_planner';

	$cid = new mysqli($hostname,$username,$password,$db);

	if($cid->connect_errno)
		{echo 'Errore connessione (' . $cid->connect_errno . ')' . $cid->connect_error;}
?>