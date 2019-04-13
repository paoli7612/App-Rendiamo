var error = $('#error');
error.hide();

var controlEmail = function(email){
  $.getJSON('../queries/existEmail.php?email='+email).done(function(e){
    if (e['utente']){
      error.show();
      $(':input[type="submit"]').prop('disabled', true);
      $(':input[type="password"]').prop('disabled', true);
    } else {
      error.hide();
      $(':input[type="submit"]').prop('disabled', false);
      $(':input[type="password"]').prop('disabled', false);
    }
  });
}


$('#inputPassword, #confirmPassword').on('keyup', function () {
  if ($('#inputPassword').val() == $('#confirmPassword').val()) {
    $('#errorPassword').hide();
    $(':input[type="submit"]').prop('disabled', false);
    $(':input[type="email"]').prop('disabled', false);
  } else{
    $('#errorPassword').show();
    $(':input[type="submit"]').prop('disabled', true);
    $(':input[type="email"]').prop('disabled', true);
  }
});
