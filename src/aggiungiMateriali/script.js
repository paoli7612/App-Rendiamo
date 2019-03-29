var file = document.getElementById('in_file');
var div = document.getElementById('files');
var n = 0;

var inputFile = function(){
  var newFile = file.cloneNode(true);
  newFile.name = "file"+n;
  n++;

  var element = "<div class=\"form-group\"><div class=\"form-label-group\"><div class=\"form-group\"><div class=\"form-label-group row\">";
  element+="<input name=\"titolo_"+n+"\" type=\"text\" id=\"inputTitle_"+n+"\" class=\"form-control col\" placeholder=\"Titolo\" value=\""+newFile.value+"\">";
  element+="<label for=\"inputTitle_"+n+"\">Titolo</label>";
  element+="<div class=\"col\"><button id=\"button_"+n+"\" style=\"height: 100%\" type=\"button\" class=\"btn btn-block text-white btn-primary\" onclick=\"cambiaTipo("+n+")\">Documento</button></div>"
  element+="</div></div></div></div>";

  div.innerHTML+=element;


}

var modal = $('#modalTipo');
var selected = null;

var cambiaTipo = function(id){
  console.log(modal);
  modal.modal('toggle');
  selected = id;
}

var impostaTipo = function(tipo, classe){
  modal.modal('toggle');
  var button = document.getElementById('button_'+selected);
  button.innerHTML = tipo;
  var ultimaClasse = button.classList[3];
  button.className = button.className.replace(ultimaClasse, classe);
}
