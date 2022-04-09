<?php
    require "../common/connection.php";
	
	$query = "SELECT * FROM lavoratore WHERE email='$email'";
	$res= $cid->query($query);
	$row = $res->fetch_row();
?>