<div id="wrapper">

  <?php $title="lezione" ?>
  <?php include '../wrapper_head.php' ?>
  <?php $id=$_GET['id'] ?>
  <?php
	$lezioni = query("SELECT lezioni.*, utenti.id as utenteid, utenti.nome, utenti.cognome
    FROM lezioni, utenti
    WHERE utenti.id=lezioni.idUtente
      AND lezioni.id=$id ");
    if ($lezioni) $lezione = $lezioni[0];
    else header('Location: ../home/');
  ?>

  <div id="content-wrapper">
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../filtra/">Lezioni</a>
        </li>
        <li class="breadcrumb-item">
          <a href="../lezione/?id=<?php echo $lezione['id'] ?>">
            <?php echo $lezione['titolo'] ?>
          </a>
        </li>
        <li class="breadcrumb-item acrive">
          Modifica materie
        </li>
      </ol>
      <form method="post">

      <div class="row">
        <div class="col">
          <div class="form-label-group">
            <input id="inputRicercaMaterie" type="text" class="form-control" placeholder="Ricerca" onkeyup="filterMaterie(this)">
            <label for="inputRicercaMaterie">Ricerca</label>
          </div>
        </div>
        <div class="col">
          <div class="form-label-group">
            <button class="btn btn-primary btn-block" style="height: 50px;">Salva</button>
          </div>
        </div>
      </div>
      <div class="modal-body">
          <?php $materie=query("SELECT materie.*, materieDiLezioni.idMateria FROM materie LEFT JOIN materieDiLezioni ON (materieDiLezioni.idMateria=materie.id AND materieDiLezioni.idLezione=$id)") ?>
          <?php foreach ($materie as $materia): ?>
            <div class="custom-control custom-checkbox" name="materia">
              <input type="checkbox" class="custom-control-input" name="materia_<?php echo $materia['id'] ?>"id="materia_<?php echo $materia['id'] ?>" <?php if ($materia['idMateria']): ?> checked="checked" <?php endif; ?>>
              <label class="custom-control-label" for="materia_<?php echo $materia['id'] ?>"><?php echo $materia['titolo'] ?></label>
            </div>
          <?php endforeach; ?>
        </div>
      </form>
      <script type="text/javascript">

        var filterMaterie = function(e){
          var text = e.value;
          var divs = document.getElementsByName("materia");
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

  </div>
</div>
