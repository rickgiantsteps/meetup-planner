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
document.getElementById("data").setAttribute("min", tomorrow);