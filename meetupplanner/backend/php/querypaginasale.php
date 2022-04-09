<?php

require "../common/connection.php";
    
    $query = "SELECT * FROM sala";
    $res= $cid->query($query);
    if (!$res) {
		header('Location: sale.php?status=ko');
		}

    if (!isset($_GET["status"])) {
        while($row = mysqli_fetch_array($res)) {
            echo '<tr>
            <td>'.$row[0].'</td>
            <td>'.$row[1].'</td>
            <td>'.$row[2].'</td>
            <td>'.$row[3].'</td>
            <td>'.$row[4].'</td>
            <td>'.$row[5].'</td>
            <td>'.$row[6].'</td>
            </tr>';
        }
    }
    else {
        echo '<tr> <td> <p>Errore!</p> </td> </tr>';
    }

?>