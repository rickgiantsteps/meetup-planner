function inviaId(idTemp) {
	console.log("Id temporaneo: "+idTemp)
	
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		  document.getElementById("fRuolo").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../backend/php/inviaId.php?idTemp="+idTemp,true);
    xmlhttp.send();
  }