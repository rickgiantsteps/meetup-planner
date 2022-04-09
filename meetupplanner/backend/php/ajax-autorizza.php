<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<?php
			session_start();
			$q = $_GET['q'];
			$_SESSION["emailA"] = $q;
			
			require "../../common/connection.php";
					
			$query3 = "SELECT * FROM lavoratore WHERE email='$q'";
			$res3= $cid->query($query3);
			$row3 = $res3->fetch_row();
			
			echo '<div class="col-lg-4">';
			if (!$res3) {
			echo '<p>Errore: email errata, impossibile visualizzare i dati.</p>';
			}
			elseif (isset($row3)) {
			echo '<h3>Dati profilo trovato</h3>
			<hr>
			<ul class="list-unstyled li-space-lg">
			<li class="media">
			<i class="fas fa-square"></i>
			<div class="media-body">Email: '.$row3[0].'</div>
			</li>
			<li class="media">
			<i class="fas fa-square"></i>
			<div class="media-body">Nome: '.$row3[1].'</div>
			</li>
			<li class="media">
			<i class="fas fa-square"></i>
			<div class="media-body">Cognome: '.$row3[2].'</div>
			</li>
			<li class="media">
			<i class="fas fa-square"></i>
			<div class="media-body">Data di nascita: '.$row3[3].'</div>
			</li>
			<li class="media">
			<i class="fas fa-square"></i>
			<div class="media-body">Ruolo: '.$row3[5].'</div>
			</li>';
			if ($row3[5] == 'Direttore') {
			echo '<li class="media">
			<i class="fas fa-square"></i>
			<div class="media-body">Data assunzione: '.$row3[6].'</div>
			</li>
			<li class="media">
			<i class="fas fa-square"></i>
			<div class="media-body">Anni servizio: '.$row3[7].'</div>
			</li>';
			}
														
			if ($row3[5] != 'Direttore') {
			echo '<li class="media">
			<i class="fas fa-square"></i>
			<div class="media-body">Nome dipartimento: '.$row3[8].'</div>
			</li>';
			}
			if (isset($row3[9])) {
			echo '<li class="media">
			<i class="fas fa-square"></i>
			<div class="media-body">Dirigente autorizzante: '.$row3[9].'</div>
			</li>
			<li class="media">
			<i class="fas fa-square"></i>
			<div class="media-body">Data autorizzazione: '.$row3[10].'</div>
			</li>';
			}
			echo '</ul>';
			echo '</div>
			<!-- end of col -->
			<div class="col-lg-8">
			<div class="image-container">';
			echo '<img class="img-fluid " src="data:image/jpeg;base64,'.base64_encode($row3[4]).'"/>';
			echo '</div>
			<!-- end of image-container -->
			
			<form action="../backend/php/autorizzaUtente.php" method="post">
				<a class="btn-outline-reg mfp-close as-button" href="#screenshots">INDIETRO</a> <button class="btn-solid-reg" type="submit" value="autorizza">AUTORIZZA</button>
			</form>
			
			</div>
			<!-- end of col -->';
			}
			else {
			echo '<p>Errore: email errata, impossibile visualizzare i dati.</p>';
			}
			unset($res); //istruzione x liberare le risorse allocate.
			?>
	</body>
</html>