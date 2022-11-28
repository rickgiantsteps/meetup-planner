function validateForm() { 
	if (/\d/.test(document.getElementById("modNome").value) || /\d/.test(document.getElementById("modCogn").value)) {
		document.getElementById("mod1").innerHTML = "<p style='color:red; position:relative;'>Non inserire cifre in nome e cognome!</p>";
		$correctform = false;
		}
	else {
		document.getElementById("mod1").innerHTML = "";
		$correctform = true;
		}
	
	$oggi = new Date();
	$birthday = document.getElementById("dataN").value.slice(0,4)

	if (!(($oggi.getFullYear()-$birthday)>=18)) {
		document.getElementById("mod2").innerHTML = "<p style='color:red; position:relative;'>È necessario essere maggiorenni per lavorare nell'azienda!</p>";
		$correctform = false;
	} else {
		document.getElementById("mod2").innerHTML = "";
	}

	if (document.getElementById("ps").value!=document.getElementById("cps").value) {
		document.getElementById("mod3").innerHTML = "<p style='color:red; position:relative;'>Le password devono essere uguali!</p>";
		$correctform = false;
	} else {
		document.getElementById("mod3").innerHTML = "";
	}

	return $correctform
}