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
