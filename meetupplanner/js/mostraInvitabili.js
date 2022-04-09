function mostraInvitabili(num) {
	var data = document.getElementById("data"+num).innerHTML;
	var ora = document.getElementById("ora"+num).innerHTML;
	var sala = document.getElementById("sala"+num).innerHTML;
	var dip = document.getElementById("dip"+num).innerHTML;

	//var dipU = document.getElementById("dipU")value;
	var ruoloU = document.getElementById("ruoloU").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("mostraInvitabili").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../backend/php/mostraInvitabili.php?data="+data+"&ora="+ora+"&sala="+sala+"&dip="+dip+"&ruoloU="+ruoloU,true);
    xmlhttp.send();
  }