<div class="modal fade" id="Docenti" tabindex="-1" role="dialog" aria-labelledby="DocentiTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DocentiTitle">Seleziona docenti:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-header">
        <div class="form-label-group">
          <input id="inputRicercaDocenti" type="text" class="form-control" placeholder="Ricerca" onkeyup="filterDocenti(this)">
          <label for="inputRicercaDocenti">Ricerca</label>
        </div>
      </div>
      <div class="modal-body">
        <?php  $docenti=query("SELECT DISTINCT utenti.* FROM utenti, lezioni WHERE lezioni.idUtente=utenti.id AND (tipo='professore' OR tipo='admin')") ?>
        <?php foreach ($docenti as $docente): ?>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="docente_<?php echo $docente['id'] ?>"id="docente_<?php echo $docente['id'] ?>">
            <label class="custom-control-label" for="docente_<?php echo $docente['id'] ?>"><?php echo $docente['cognome'] ?> <?php echo $docente['nome'] ?></label>
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

var filterDocenti = function(e){
  var text = e.value;
  var modal = document.getElementById("Docenti");
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
