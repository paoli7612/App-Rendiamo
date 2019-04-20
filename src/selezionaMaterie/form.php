<div class="card">
  <div class="card-header">
    Seleziona materie
    <a class="float-right">
      <i class="fas fa-book"></i>
    </a>
  </div>
  <div class="card-body">
    <div class="form-group">
      <div class="form-label-group">
        <label for="inputPassword">
          <i class="fas fa-search"></i> Cerca</label>
        <input type="text" onkeyup="filterMaterie(this)" class="form-control">
      </div>
    </div>
    <form action="post.php" method="post">
      <input type="hidden" name="idLezione" value="<?php echo $_GET['id'] ?>">
      <div class="row ml-3" id="materie">
        <?php $materie = query("SELECT materie.*, materieDiLezioni.idMateria FROM materie LEFT JOIN materieDiLezioni ON (materieDiLezioni.idMateria=materie.id AND materiedilezioni.idLezione=$idLezione) ORDER BY titolo") ?>
        <?php foreach ($materie as $materia): ?>
          <div class="col-xl-4 col-md-6 col-sm-12 custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="materia_<?php echo $materia['id'] ?>"id="materia_<?php echo $materia['id'] ?>" <?php if (isset($materia['idMateria'])): ?> checked="checked" <?php endif; ?>>
            <label class="custom-control-label" for="materia_<?php echo $materia['id'] ?>"><?php echo $materia['titolo'] ?></label>
          </div>
        <?php endforeach; ?>
      </div>
      <button type="submit" class="btn btn-primary ml-3 float-right">Salva</button>
      <button type="button" class="btn btn-secondary float-right" onclick="window.location='../lezione/?id=<?php echo $idLezione ?>'">Annulla</button>
    </form>
  </div>
</div>

<script type="text/javascript">

  var filterMaterie = function(e){
    var text = e.value
    var divs = document.getElementById('materie').getElementsByTagName("div");
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
