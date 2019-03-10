var input = document.getElementById('search');
var filtro = document.getElementById('filtro').value;
var table = document.getElementById('result');

var update = function(json) {
  console.log('../_queries/lezioni.php?search='+input.value+'&filtro='+filtro);
  $json = $.getJSON('../_queries/lezioni.php?search='+input.value+'&filtro='+filtro);
  console.log($json);
  $json.done(function($data){
    cleanSearch();
    for (var i=0; i<$data.length; i++){
      addSearch($data[i]['row']['titolo']);
    }
  });
}

var cleanSearch = function(text){
  $('tr.card').remove();
}

var addSearch = function(text){
  console.log($('table#result').after('<tr class="card"><td>'+text+'</td></tr>'));
}
