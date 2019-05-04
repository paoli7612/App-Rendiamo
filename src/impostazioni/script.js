var changeAiuti = function(e){
  $.getJSON('../queries/aiuti.php?k='+(+e.checked)).done(function(e){
  });
}

var changeNotifiche = function(e){
  if (e.checked) {
    $('#navNotifiche').show();
    $('#navNotificheN').show();
  } else {
    $('#navNotifiche').hide();
    $('#navNotificheN').hide();
  }
  $.getJSON('../queries/notifiche.php?k='+(+e.checked)).done(function(e){
  });
}
