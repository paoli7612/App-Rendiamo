var titolo = document.getElementById('titolo');
var utente = document.getElementById('idUtente');

var changeTitle = function(name){
  $.getJSON('../_queries/titolo.php?titolo='+titolo.value+'&utente='+utente.value).done( function(data){
    if (data){
      $('span#error').text('');
      document.getElementById('submit').disabled = false
    } else {
      $('span#error').text('Titolo lezione gia utilizzato');
      document.getElementById('submit').disabled = true
    }
  });
}

var help = function(n){
  a = document.getElementById('help'+n);
  if (a.className.indexOf('w3-hide') != -1){
    a.className = a.className.replace('w3-hide', '')
  } else {
    a.className += ' w3-hide'
  }
}


var select = function(n){
  var input = $('input#input_'+n)[0];
  console.log(input.checked)
  if (input.checked){
    $('tr#tr_'+n).removeClass('w3-red')
  } else {
    $('tr#tr_'+n).addClass('w3-red')
  }
  input.checked = !input.checked;
}

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();

$('#datePicker').val(yyyy+'-'+mm+'-'+dd);
