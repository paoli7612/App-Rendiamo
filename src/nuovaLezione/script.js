var utente = document.getElementById('idUtente').value;

var update = function(titolo) {
  console.log('../_queries/titolo.php?titolo='+titolo+'&utente='+utente);
  $json = $.getJSON('../_queries/titolo.php?titolo='+titolo+'&utente='+utente);
  $json.done(function($data){
    cleanSearch();
    $('span#error').replaceWith('<span id="error"></span>');
    if($data){
      $('button#submit').removeAttr('disabled');
    } else {
      $('span#error').append('lezione gia creata');
      $('button#submit').attr('disabled', 'disabled');
    }
  });
}

var cleanSearch = function(text){
  $('tr.card').remove();
}

var addSearch = function(text){
  console.log($('table#result').after('<tr class="card"><td>'+text+'</td></tr>'));
}
