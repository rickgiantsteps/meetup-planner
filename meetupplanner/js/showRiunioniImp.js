function showRiunioniImp() {
	
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("riunioniA").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../backend/php/riunioniImportanti.php",true);
    xmlhttp.send();
	}