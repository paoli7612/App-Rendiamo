var container = document.getElementById('files');
var inputFile = document.getElementById('input');
var button = document.getElementById('add');
var submit = document.getElementById('submit');
var n = 2;

var newFile = function(){
  if (n < 6){
    path = inputFile.value;
    var element = document.createElement('div');
    element.setAttribute('class', 'w3-panel w3-animate-left w3-card-4 w3-theme-l'+n);
      var div = document.createElement('div');
      div.setAttribute('class', 'w3-panel');
        var input = inputFile.cloneNode(true);
        input.setAttribute('name', 'file'+(n-1));
        div.appendChild(input);
        var label = document.createElement('label');
        label.innerHTML = path.split('\\')[2];
        div.appendChild(label);
      element.appendChild(div);
    container.appendChild(element);
    submit.disabled = false;
    n++;
    if (n == 6){
      button.setAttribute('disabled', 'disabled');
    }
  }
}

var plus = function(){
  inputFile.click();
}
