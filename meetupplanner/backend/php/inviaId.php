<?php
	session_start();
	
	$idTemp = $_GET['idTemp'];
	
	$_SESSION["idTemp"] = $idTemp;
	
	echo '<p>Filtra per ruolo:</p>
			<select autocomplete="off" type="text" class="form-control" placeholder="..." onchange="mostraInvitabili('.$idTemp.')" id="ruoloU" name="ruoloU">
				<option value="" selected>Non specificare</option>
				<option value="Funzionario">Funzionario</option>
				<option value="Impiegato semplice">Impiegato semplice</option>
				<option value="Capo settore">Capo settore</option>
				<option value="Direttore">Direttore</option>
			</select>';
	?>