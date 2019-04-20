var salvaLezione = function(button, id){
  var i = button.getElementsByTagName('i')[0];
  if (i.className == 'fas fa-bookmark'){
    i.className = 'far fa-bookmark';
  } else {
    i.className = 'fas fa-bookmark';
    var azione = "salva"
  }
  $.getJSON('../queries/salvaLezione.php?id='+id+'&azione='+azione).done(function(e){
    console.log(e);
  });

}


var controllaTitolo = function(titolo){
  $.getJSON('../queries/titoloLezione.php?titolo='+titolo).done(function(e){
    if (e['lezione']){
      $('#error').show();
      $(':input[type="submit"]').prop('disabled', true);
    } else {
      $('#error').hide();
      $(':input[type="submit"]').prop('disabled', false);
    }
  });
}
