<?php $materie = getMaterie(); ?>

<div class="w3-panel w3-right w3-animate-right">
  <select class="w3-input w3-light-grey" name="materia" onchange="filter()" id="filter">
    <option>...</option>
    <?php foreach ($materie as $materia): ?>
      <option><?php echo $materia->titolo ?></option>
    <?php endforeach; ?>
  </select>
</div>


<script type="text/javascript">
  var select = document.getElementById('filter');
  var filter = function(){
    var table = document.getElementById('t1');
    rows = table.rows;
    var s = select.value;
    if (s == "..."){
      for (var i=1; i<(rows.length); i++) {
        rows[i].hidden = false;
      }
      return;
    }
    for (var i=1; i<(rows.length); i++) {
      var tr = rows[i]
      var td = tr.cells[2];
      tr.hidden = !(td.innerHTML.indexOf(s) != -1);
    }
  }
</script>

<style>
	div#cerca {
		
	}
</style>

<div class="w3-margin-top w3-right w3-animate-right " >
    <button onmouseover="myFunction('Demo1')" class="w3-btn w3-circle w3-theme-l2" style="border-radius: 0px 20px 20px 0px;">
		<i class="fas fa-search w3-small"></i>
	</button>
	<div id="Demo1" class="w3-hide w3-left ">
	  <input class="w3-input w3-card4 w3-margin-left" type="text" style="border-radius: 20px 0px 0px 20px;">
	 </div>	
</div>

<script>
var b = "20px 0px 0px 20px";
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
	document.getElementById('input').style["border-radius"]=null;
  } else { 
    x.className = x.className.replace(" w3-show", "");
	document.getElementById('input').style["border-radius"]=b;
  }
}
</script>

