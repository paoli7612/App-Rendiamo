var changeAiuti = function(e){
  $.getJSON('../queries/aiuti.php?k='+(+e.checked)).done(function(e){
  });
}

var changeNotifiche = function(e){
  $.getJSON('../queries/notifiche.php?k='+(+e.checked)).done(function(e){
  });
}
