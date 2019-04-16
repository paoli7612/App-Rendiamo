<div class="modal fade" id="Materie" tabindex="-1" role="dialog" aria-labelledby="MaterieTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MaterieTitle">Seleziona materie:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-header">
        <div class="form-label-group">
          <input id="inputRicercaMaterie" type="text" class="form-control" placeholder="Ricerca" onkeyup="filterMaterie(this)">
          <label for="inputRicercaMaterie">Ricerca</label>
        </div>
      </div>
      <div class="modal-body">
        <?php $materie=query("SELECT * FROM materie") ?>
        <?php foreach ($materie as $materia): ?>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="materia_<?php echo $materia['id'] ?>"id="materia_<?php echo $materia['id'] ?>">
            <label class="custom-control-label" for="materia_<?php echo $materia['id'] ?>"><?php echo $materia['titolo'] ?></label>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Conferma</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

var filterMaterie = function(e){
  var text = e.value;
  var modal = document.getElementById("Materie");
  var body = modal.getElementsByClassName("modal-body")[0];
  var divs = body.getElementsByTagName("div");
  for (var i=0; i<divs.length; i++){
    d = divs[i];
    var t = d.getElementsByTagName("label")[0].innerHTML;
    if (t.toUpperCase().indexOf(text.toUpperCase()) == -1){
      d.style['display'] = 'none';
    } else {
      d.style['display'] = '';
    }
  }
}
</script>
