var autoincrement = 0;
var keyupEtichetta  = function(a){
  var string = a.value;
  if (string.substr(string.length - 1, string.length) == " "){
    var etichetta = string.substr(0, string.length - 1);
    autoincrement++;
    $('#etichette').append("<div class=\"form-group\"><input type=\"hidden\" name=\"etichetta_"+autoincrement+"\" value=\""+etichetta+"\"><div class=\"form-label-group\"><button onclick=\"eliminaEtichetta(this)\" type=\"button\" class=\"btn btn-block btn-dark\">"+etichetta+"<i class=\"fas fa-times float-right\"></i></button></div></div>");
    a.value="";
  }
}

var eliminaEtichetta = function(a){
  a.parentElement.parentElement.remove();
}

var filterMaterie = function(e){
  var text = e.value;
  var modal = document.getElementById("Materie");
  var body = modal.getElementsByClassName("modal-body")[0];
  var divs = body.getElementsByTagName("div");
  for (var i=0; i<divs.length; i++){
    d = divs[i];
    var t = d.getElementsByTagName("label")[0].innerHTML;
    if (t.indexOf(text) == -1){
      d.style['display'] = 'none';
    } else {
      d.style['display'] = '';
    }
  }
}
var error = $('div#error');
error.hide();

var controlTitolo = function(e){
  var titolo = e.value;
  var utente = document.getElementById('idUtente').value;
  $.getJSON('../queries/titoloLezione.php?idUtente='+utente+'&titolo='+titolo).done(function(e){
    if (e['lezione']){
      error.show();
      $(':input[type="submit"]').prop('disabled', true);
    } else {
      error.hide();
      $(':input[type="submit"]').prop('disabled', false);
    }
  });
}
