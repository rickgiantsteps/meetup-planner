function showSaleDisp(contenitore) {
	var data = document.getElementById("data").value;
	var ora = document.getElementById("ora").value;
	var durata = document.getElementById("durata").value;
	var dip = document.getElementById("dip").value;
	
  if (dip == "" || data == "" || ora == "" || durata == "") {
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(contenitore).innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../backend/php/ajax-saleDisp.php?dip="+dip+"&data="+data+"&ora="+ora+"&durata="+durata,true);
    xmlhttp.send();
  }
}