<?php $materie = getMaterie(); ?>

<div class="w3-panel w3-right">
  <select class="w3-input w3-card-4 w3-light-grey" name="materia" onchange="filter()" id="filter">
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
      var td = tr.cells[1];
      tr.hidden = !(td.innerHTML.indexOf(s) != -1);
    }
  }
</script>
