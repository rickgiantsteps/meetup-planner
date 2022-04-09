<?php

	require "../common/connection.php";

	$query = "SELECT * FROM riunione";
	$res= $cid->query($query);

	while($row = mysqli_fetch_array($res)) {
		echo "{
				title: '".$row[2]." (".$row[4]."m)',
				start: '".$row[0]."T".$row[1]."'
			 },";
		}

		unset($res);
?>