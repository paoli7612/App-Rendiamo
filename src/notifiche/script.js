var ignora = function (id){
  document.getElementById(id).remove();
  var n = $('.badge').html()-1;
  if (n) {
    $('.badge').html(n);
  } else {
    $('.badge').hide();
    $('.badge').hide();
    $('#noNotifiche').show();
  }
  $.getJSON('../queries/eliminaNotifica.php?id='+id).done(function(e){
    console.log(e);
  });
}
