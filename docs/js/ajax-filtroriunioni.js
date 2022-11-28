function showRiunioni() {
	var dip = document.getElementById("dip").value;
	var date = document.getElementById("giorno").value;
    var settimana = document.getElementById("settimana").value;
    var mese = document.getElementById("mese").value;
    var anno = document.getElementById("anno").value;
	
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("riunioniA").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../backend/php/ajax-filtroriunioni.php?dip="+dip+"&date="+date+"&settimana="+settimana+"&mese="+mese+"&anno="+anno,true);
    xmlhttp.send();

}