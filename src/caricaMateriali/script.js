var selezionaFile = function(e){
  $('#titolo').val(e.files[0]['name']);
  $('#titolo').prop( "disabled", false );

}

var selezionaTipo = function(e, id){
  console.log(id);

}
