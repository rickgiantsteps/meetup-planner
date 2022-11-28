function passaParametri(num) {
	var data = document.getElementById("data"+num).innerHTML;
	var ora = document.getElementById("ora"+num).innerHTML;
	var sala = document.getElementById("sala"+num).innerHTML;
	var dip = document.getElementById("dip"+num).innerHTML;

	console.log(num+": "+data+" "+ora+" "+sala+" "+dip);
	
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		    document.getElementById("infoR").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../backend/php/stampaInfoR.php?data="+data+"&ora="+ora+"&sala="+sala+"&dip="+dip,true);
    xmlhttp.send();
  }