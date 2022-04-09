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
	
	if ($_GET['cap'] == "") {
		$cap = "IS NOT NULL";
		}
	else {
		$cap = ">= '".$_GET['cap']."'";
		}
		
	if ($_GET['tav'] == "") {
		$tav = "IS NOT NULL";
		}
	else {
		$tav = ">= '".$_GET['tav']."'";
		}
		
	if ($_GET['lav'] == "") {
		$lav = "IS NOT NULL";
		}
	else {
		$lav = ">= '".$_GET['lav']."'";
		}
		
	if ($_GET['comp'] == "") {
		$comp = "IS NOT NULL";
		}
	else {
		$comp = ">= '".$_GET['comp']."'";
		}
		
	if ($_GET['pro'] == "") {
		$pro = "IS NOT NULL";
		}
	else {
		$pro = ">= '".$_GET['pro']."'";
		}
	
	$query1 = "SELECT * FROM sala WHERE nome_dipartimento ".$dip." AND capienza ".$cap." AND n_tavoli ".$tav." AND lavagne ".$lav." AND computer ".$comp." AND proiettori ".$pro;
	//$query1 = "SELECT * FROM sala";
    $res1= $cid->query($query1);

	if (!$res1) {
		header('Location: ../../frontend/sale.php?status1=ko');
		}
	else {
		//Operazione correttamente eseguita.
		}
	
	echo '<table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Dipartimento</th>
                <th>Capienza</th>
                <th>Tavoli</th>
                <th>Lavagne</th>
                <th>Computer</th>
                 <th>Proiettori</th>
            </tr>
        </thead>
        <tbody>';
            while($row1 = mysqli_fetch_array($res1)) {
                echo '<tr>
					<td>'.$row1[0].'</td>
                    <td>'.$row1[1].'</td>
                    <td>'.$row1[2].'</td>
                    <td>'.$row1[3].'</td>
                    <td>'.$row1[4].'</td>
                    <td>'.$row1[5].'</td>
                    <td>'.$row1[6].'</td>
                    </tr>';
            }
		echo '</tbody>
			</table>';

	unset($res); //istruzione x liberare le risorse allocate.
	?>