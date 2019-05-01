var selezionaFile = function(e){
  $('#titolo').val(e.files[0]['name']);
  $('#titolo').prop( "disabled", false );
  $('#tipo').prop( "disabled", false );
  $('#tipo').prop

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
      $(':input[type="submit"]').prop('disabled', false);
      $('#tipo').prop('disabled', false);
    }
  });
}
