var selezionaFile = function(e){
  if (e.files){
    $('#titolo').val(e.files[0]['name']);
    if (e.files[0]['size'] > 5000000){
      $('#size').show();
    } else {
      $('#size').hide();
      $('#titolo').val(e.files[0]['name']);
      $('#titolo').prop( "disabled", false );
      $('#tipo').prop( "disabled", false );
      controllaTitoloMateriale(document.getElementById('titolo').value, document.getElementById('idLezione').value);
    }
}
}

var selezionaTipo = function(e){
  $('#submit').prop( "disabled", false );
  $('.tipo').hide();
  $('.tipo-'+e).show();
}

var controllaTitoloMateriale = function(titolo, idLezione){
  $.getJSON('../queries/titoloMateriale.php?titolo='+titolo+'&idLezione='+idLezione).done(function(e){
    if (e['materiale']){
      $('#error').show();
      $(':input[type="submit"]').prop('disabled', true);
      $('#tipo').prop('disabled', true);
    } else {
      $('#error').hide();
      if (document.getElementById('tipo').value != "Tipo")
      $(':input[type="submit"]').prop('disabled', false);
      $('#tipo').prop('disabled', false);
    }
  });
}
