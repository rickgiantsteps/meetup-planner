function showSale() {
	var dip = document.getElementById("dip").value;
	var cap = document.getElementById("cap").value;
	var tav = document.getElementById("tav").value;
	var lav = document.getElementById("lav").value;
	var comp = document.getElementById("comp").value;
	var pro = document.getElementById("pro").value;
	
  if (dip == "" && cap == "" && tav == "" && lav == "" && comp == "" && pro == "") {
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tSale").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../backend/php/ajax-sale.php?dip="+dip+"&cap="+cap+"&tav="+tav+"&lav="+lav+"&comp="+comp+"&pro="+pro,true);
    xmlhttp.send();
  }
}