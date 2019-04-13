var file = document.getElementById('in_file');
var div = document.getElementById('files');
var submit = document.getElementById('submit');
var n = 0;

var inputFile = function(){
  submit.disabled=false
  var newFile = file.cloneNode(true);
  newFile.name = "file"+n;
  n++;
  c = file.cloneNode(true);
  c.name = "file_"+n;
  c.id = "file_"+n;
  div.appendChild(c);

  formGroup = document.createElement('div');
  formGroup.className = 'form-group row';
    col1 = document.createElement('div');
    col1.className = 'col';
	  formGroupLabel = document.createElement('div');
	  formGroupLabel.className = 'form-label-group';
        formControl = document.createElement('input');
        formControl.className = "form-control";
        formControl.placeholder = "Titolo";
	      formControl.value = newFile.files[0].name.split(".")[0];
        formControl.name = "input_"+n;
        label = document.createElement('label');
        label.innerHTML = "Titolo";
        formControl.id = 'inputTitolo_'+n;
        label.setAttribute('for','inputTitolo_'+n);
	  formGroupLabel.appendChild(formControl);
	  formGroupLabel.appendChild(label);
	col1.appendChild(formGroupLabel);
	col2 = document.createElement('div');
	col2.className = 'col';
	  formGroupLabel = document.createElement('div');
	  formGroupLabel.className = '';
        button = document.createElement('input');
		button.type = 'text'
        button.className = "btn btn-block text-white btn-primary";
		button.value = 'Documento';
		button.style['height'] = '50px';
		button.id = "button_"+n;
		button.name = "button_"+n
		button.setAttribute('onclick', 'cambiaTipo("'+n+'")');
	  formGroupLabel.appendChild(button);
	col2.appendChild(formGroupLabel);
  formGroup.appendChild(col1);
  formGroup.appendChild(col2);
  div.appendChild(formGroup);
}

var modal = $('#modalTipo');
var selected = null;

var cambiaTipo = function(id){
  modal.modal('toggle');
  selected = id;
}

var impostaTipo = function(tipo, classe){
  modal.modal('toggle');
  var button = document.getElementById('button_'+selected);
  button.value = tipo;
  var ultimaClasse = button.classList[3];
  button.className = button.className.replace(ultimaClasse, classe);
}
