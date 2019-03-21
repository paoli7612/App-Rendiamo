var toggle = function(n){
  var div = document.getElementById('toggle_'+n);
  var button = document.getElementById('button_'+n);
  if (div.className.indexOf('w3-hide') == -1){
    div.className = 'w3-hide';
    div.getElementsByTagName('select')[0].value = 0
    div.getElementsByTagName('select')[0].onchange();
    button.className = button.className.replace(' radius-right w3-quarter', '');
  } else {
    div.className = " ";
    button.className += ' radius-right w3-quarter';
  }
}

var filter_materia = function(){
  var select = document.getElementById('materia');
  window.location="../lezioni?materia="+select.value;
}

var filter_utente = function(){
  var select = document.getElementById('utente')
  window.location="../lezioni?utente="+select.value;
}

var filter = function(){
  var input = document.getElementById('ricerca');
  var idMateria = document.getElementById('materia').value;
  var idUtente = document.getElementById('utente').value;
  window.location = '../lezioni?materia='+idMateria+'&utente='+idUtente+'&ricerca='+input.value;
}

$(document).ready(function(){
   $('form').submit(function(){
     $.post($(this).attr('action'), $(this).serialize(), function(response){
             filter();
       },'json');
       return false;
   });
});
