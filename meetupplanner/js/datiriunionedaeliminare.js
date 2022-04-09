function parametri_riunione_eliminare(num) {
	var data = document.getElementById("data"+num).innerHTML;
	var ora = document.getElementById("ora"+num).innerHTML;
	var sala = document.getElementById("sala"+num).innerHTML;
	var dip = document.getElementById("dip"+num).innerHTML;
	var tema = document.getElementById("tema"+num).innerHTML;
	var durata = document.getElementById("durata"+num).innerHTML;
	
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		    document.getElementById("deleteriunione").innerHTML = this.responseText;
			document.getElementById("infoRMod").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../backend/php/RiunionedaEliminareinfo.php?data="+data+"&ora="+ora+"&sala="+sala+"&dip="+dip+"&tema="+tema+"&num="+num+"&durata="+durata,true);
    xmlhttp.send();
  }