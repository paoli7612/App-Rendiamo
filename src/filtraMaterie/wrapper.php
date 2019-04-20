<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      Ricerca per materie
    </li>
  </ol>

  <div class="row">
    <?php $materie = query("SELECT materie.*, count(materieDiLezioni.id) AS count FROM materie, materieDiLezioni WHERE materie.id=materieDiLezioni.idMateria GROUP BY materie.id ORDER BY materie.titolo");?>
    <?php foreach ($materie as $materia): ?>
      <div class="col-xl-4 col-md-6 col-sm-6 mb-3">
        <button class="btn btn-block btn-primary h-100 p-3 mb-3" onclick="window.location='../lezioni/?materia=<?php echo $materia['id'] ?>'">
          <div class="float-right">
            <i class="fa-lg fas fa-book"></i>
          </div>
          <div class="float-left">
            <?php echo $materia['titolo']?>
            (<?php echo $materia['count']?>)
          </div>
        </button>
      </div>
    <?php endforeach; ?>
  </div>
</div>
