function showSaleDisp2(contenitore) {
	var data = document.getElementById("data2").value;
	var ora = document.getElementById("ora2").value;
	var durata = document.getElementById("durata2").value;
	var dip = document.getElementById("dip2").value;
	console.log(data+" "+ora+" "+durata+" "+dip);
	
  if (dip == "" || data == "" || ora == "" || durata == "") {
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(contenitore).innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../backend/php/ajax-saleDisp2.php?dip="+dip+"&data="+data+"&ora="+ora+"&durata="+durata,true);
    xmlhttp.send();
  }
}