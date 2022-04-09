function newRiunione(num) {
	var data = document.getElementById("data"+num).innerHTML;
	var ora = document.getElementById("ora"+num).innerHTML;
	var sala = document.getElementById("sala"+num).innerHTML;
	var dip = document.getElementById("dip"+num).innerHTML;
	var tema = document.getElementById("tema"+num).innerHTML;
	var durata = document.getElementById("durata"+num).innerHTML.slice(0, -7);
	var tomorrow = new Date();
	var dd = tomorrow.getDate()+1;
	var mm = tomorrow.getMonth() + 1;
	var yyyy = tomorrow.getFullYear();

	if (dd < 10) {
		dd = '0' + dd;
		}

	if (mm < 10) {
		mm = '0' + mm;
	} 
      
	tomorrow = yyyy + '-' + mm + '-' + dd;
	
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		//document.getElementById("modifyriunione").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../backend/php/ajax-modificaRiunione.php?data="+data+"&ora="+ora+"&sala="+sala+"&dip="+dip+"&tema="+tema+"&durata="+durata+"&tomorrow="+tomorrow,true);
    xmlhttp.send();
  }