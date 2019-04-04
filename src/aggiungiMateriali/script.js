var file = document.getElementById('in_file');
var div = document.getElementById('files');
var submit = document.getElementById('submit');
var n = 0;

var inputFile = function(){
  submit.disabled=false
  var newFile = file.cloneNode(true);
  newFile.name = "file"+n;
  n++;
  console.log(file.files[0]);
  c = document.createElement('input');
  c.type = "file";
  c.name = "file_"+n;
  c.files = file.files;

  a = document.createElement('div');
  a.className = 'form-group';
    b = document.createElement('div');
    b.className = 'form-label-group row';
      b1 = document.createElement('div');
      b1.className = 'col';
        c = document.createElement('input');
        c.className = "form-control";
        c.placeholder = "Titolo";
        e = document.createElement('label');
        e.innerHTML = "Titolo";
        c.id = 'inputTitolo_'+n;
        e.setAttribute('for','inputTitolo_'+n)

      b1.appendChild(c);
      b1.appendChild(e);
      b2 = document.createElement('div');
      b2.className = 'col';
        d = document.createElement('button');
        d.className = 'btn btn-block text-white btn-primary';
        d.type = 'button';
        d.style['width'] = "100%";
        d.innerHTML = 'Documento';
      b2.appendChild(d)
    b.appendChild(b1);
    b.appendChild(b2);
  a.appendChild(b);
  div.appendChild(a);

  console.log(a)

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
