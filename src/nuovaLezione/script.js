//imposta data attuale
var today = new Date();
var year = today.getFullYear()
var month = ('0' + (today.getMonth() + 1)).slice(-2)
var day = ('0' + today.getDate()).slice(-2)
var fullDate = year + '-' + month + '-' + day;
console.log(fullDate)
document.getElementById('date').value = fullDate;


var select = function(id){
  var input = document.getElementById("check_"+id);
  var tr = document.getElementById("tr_"+id)
  input.checked = !input.checked;
  if (input.checked)
    tr.className = "w3-theme-d2";
  else{
    tr.className = "";
  }
}
