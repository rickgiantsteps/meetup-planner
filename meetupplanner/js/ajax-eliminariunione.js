function eliminariunione() {
	/*var data = document.getElementById("data"+num).innerHTML;
	var ora = document.getElementById("ora"+num).innerHTML;
	var sala = document.getElementById("sala"+num).innerHTML;
	var dip = document.getElementById("dip"+num).innerHTML;*/
	
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		//Non fare nulla.
      }
    };
    xmlhttp.open("GET","../backend/php/eliminariunione.php",true);
    xmlhttp.send();
  }