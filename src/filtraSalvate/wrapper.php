<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      Lezioni salvate
    </li>
  </ol>

  <div class="row">
    <?php
      $lezioni = query("SELECT lezioni.id, lezioni.titolo, utenti.nome, utenti.cognome
        FROM lezioni, utenti, utentiDiLezioni
        WHERE utentiDiLezioni.idLezione=lezioni.id AND
        utentiDiLezioni.idUtente=$idUtente AND
        utenti.id=lezioni.idUtente;");
    ?>
    <?php foreach ($lezioni as $lezione): ?>
      <div class="col-xl-6 col-sm-6 mb-3" onclick="window.location='../lezioni/?materia=<?php echo $materia['id'] ?>'">
        <div class="card text-white o-hidden h-100 onmouseover bg-warning" onmouseover="hover(this)" onmouseleave="leave(this)">
          <div class="card-body">
            <div class="float-right">
              <i class="fas fa-layer-group"></i>
            </div>
            <div class="mr-5"><?php echo $materia['titolo']; ?></div>
          </div>
          <a class="card-footer text-white clearfix small z-1">
            <span class="float-left">Visualizza le <?php echo $materia['count'] ?> lezioni</span>
              <span class="float-right">
              <i class="fas fa-angle-right"></i>
              </span>
          </a>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>
