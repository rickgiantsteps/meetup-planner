<?php

    require "../common/connection.php";

    $query = "SELECT * FROM riunione WHERE data < CURRENT_DATE()";
    $res= $cid->query($query);
    if (!$res) {
        header('Location: riunioni_passate.php?status=ko');
        }
    else {
        //Operazione correttamente eseguita.
        }

        $counter = -1;
    while($row = mysqli_fetch_array($res)) {    
        $counter = $counter + 1;
        echo
        '<tr>
            <td style="overflow: auto" class="text-center" id="data'.strval($counter).'">'.$row[0].'</td>';

            $querylav = "SELECT nome, cognome FROM lavoratore WHERE '$row[6]' = email";
            $reslav= $cid->query($querylav);
            if (!$reslav) {
                header('Location: riunioni_passate.php?status=ko');
                }
            else {
                //Operazione correttamente eseguita.
                }
            $rowlav = mysqli_fetch_array($reslav);

            echo '<td style="overflow: auto">'.$rowlav[0].' '.$rowlav[1].'</td>
            <td style="overflow: auto">'.$row[6].'</td>
            <td style="overflow: auto" id="ora'.strval($counter).'">'.$row[1].'</td>
			<td style="overflow: auto" id="durata'.strval($counter).'">'.$row[4].' minuti</td>
			<td style="overflow: auto" id="sala'.strval($counter).'">'.$row[2].'</td>
			<td style="overflow: auto" id="dip'.strval($counter).'">'.$row[3].'</td>
			<td id="tema'.strval($counter).'" style="overflow: auto">'.$row[5].'</td>
            <td class="td-actions text-center">
                <button type="button" id="'.strval($counter).'" rel="tooltip" class="btn btn-info btn-just-icon btn-sm popup-with-move-anim" href="#details-lightbox-2" onclick="mostravecchiinviati(this.id)" title="invita">
                <i class="material-icons">person</i>
                </button>
            </td>
        </tr>';
    }
?>