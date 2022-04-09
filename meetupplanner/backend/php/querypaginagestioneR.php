<?php

                            require "../common/connection.php";

                           $query = "SELECT * FROM riunione WHERE data > CURRENT_DATE()";
                           $res= $cid->query($query);
                           if (!$res) {
                              header('Location: gestioneR.php?status=ko');
                              }
                           else {
                              //Operazione correttamente eseguita.
                              }
                              
							$counter = -1;
                           while($row = mysqli_fetch_array($res)) {
							   $counter = $counter + 1;
                              echo
											'<tr>
												<td class="text-center" style="overflow: auto" id="data'.strval($counter).'">'.$row[0].'</td>';

												$querylav = "SELECT nome, cognome FROM lavoratore WHERE '$row[6]' = email";
												$reslav= $cid->query($querylav);
                                    if (!$reslav) {
                                       header('Location: ../../frontend/gestioneR.php?status=ko');
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
                                    <button type="button" id="'.strval($counter).'" rel="tooltip" class="btn btn-info btn-just-icon btn-sm popup-with-move-anim" href="#details-lightbox-2" title="Invita" onclick="passaParametri(this.id); mostraInvitabili(this.id); inviaId(this.id);">
                                    <i class="material-icons">person</i>
                                    </button>
                                    <button type="button" id="'.strval($counter).'" rel="tooltip" class="btn btn-success btn-just-icon btn-sm popup-with-move-anim" href="#details-lightbox-3" title="Modifica" onclick="newRiunione(this.id); parametri_riunione_eliminare(this.id);">
                                    <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" id="'.strval($counter).'" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm popup-with-move-anim" href="#details-lightbox-4" title="Elimina" onclick="parametri_riunione_eliminare(this.id);">
                                    <i class="material-icons">close</i>
                                    </button>
                                 </td>
                              </tr>';
                           }

?>