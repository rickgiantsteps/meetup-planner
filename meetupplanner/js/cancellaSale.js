function cancellaSale (contenitore) {
	document.getElementById(contenitore).innerHTML = "<select autocomplete='off' class='custom-select input-sm' id='salaDisp' name='sala' required>"
												+"<option value='' disabled selected>Sale: inserisci tutti i campi precedenti!</option>"
												+"</select>";
	}