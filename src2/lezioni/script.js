var input = document.getElementById('search');
var materia = document.getElementById('materia').value;
var table = document.getElementById('result');
var xhr = new XMLHttpRequest();

var update = function(json) {
  $json = $.getJSON('../_queries/lezioni.php?search='+input.value+'&materia='+materia)
  $json.done(function($data){
    cleanSearch();
    for (var i=0; i<$data.length; i++){
      addSearch($data[i]['row']['titolo']);
    }
  });
}

var cleanSearch = function(text){
  $('tr').remove();
}

var addSearch = function(text){
  console.log($('table#result').after('<tr><td>'+text+'</td></tr>'));
}
