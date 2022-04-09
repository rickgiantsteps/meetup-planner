function inviaSala() {
	var sala = document.getElementById("salaDisp").value;
	console.log("Sala scelta: "+sala)
	
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      }
    };
    xmlhttp.open("GET","../backend/php/inviaSala.php?sala="+sala,true);
    xmlhttp.send();
  }