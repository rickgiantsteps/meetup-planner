function showUser(str, contenitore) {
  if (str == "") {
    document.getElementById(contenitore).innerHTML = "<p style='color:red;'>Inserire un profilo utente!</p>";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(contenitore).innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../backend/php/ajax-autorizza.php?q="+str,true);
    xmlhttp.send();
  }
}