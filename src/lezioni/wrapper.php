<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      Lezioni
    </li>
  </ol>


  <?php
    if (isset($_GET['materia'])) {
      $idMateria = $_GET['materia'];
      $lezioni = query("SELECT lezioni.*, utenti.nome, utenti.cognome
                        FROM lezioni, materieDiLezioni, utenti
                        WHERE lezioni.id=materieDiLezioni.idLezione
                          AND materieDiLezioni.idMateria=$idMateria
                          AND utenti.id=lezioni.idUtente");
    } elseif (isset($_GET['docente'])) {
      $idDocente = $_GET['docente'];
      $lezioni = query("SELECT lezioni.*, utenti.nome, utenti.cognome
                        FROM lezioni, utenti
                        WHERE lezioni.idUtente=$idDocente
                          AND utenti.id=$idDocente");
    }
  ?>


  <div class="row">
    <?php foreach ($lezioni as $lezione): ?>
    <div class="col-xl-6 col-md-6 col-sm-12">
      <div class="card text-white bg-secondary mb-3">
        <div class="card-body">
          <?php echo $lezione['titolo'] ?>
        </div>
        <div class="card-footer">
          <div class="float-right">
            <i class="fas fa-book"></i>
          </div>
          <?php $materie = query("SELECT materie.* FROM materie, materieDiLezioni WHERE materie.id=materieDiLezioni.idMateria AND materieDiLezioni.idLezione=".$lezione['id']) ?>
          <?php if ($materie): ?>
            <?php foreach ($materie as $materia): ?>
              <?php echo $materia['titolo'] ?>
            <?php endforeach; ?>
          <?php else: ?>
            Nessuna materia
          <?php endif; ?>
        </div>
        <div class="card-footer">
          <div class="float-right">
            <i class="fas fa-user"></i>
          </div>
          <?php echo $lezione['cognome'] ?>
          <?php echo $lezione['nome'] ?>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col">
              <button class="btn bg-white btn-block" onclick="window.location='../lezione/?id=<?php echo $lezione['id'] ?>'">
                Visualizza</button>
            </div>
            <div class="col">
              <button class="btn bg-white btn-block" disabled="disabled">
                <i class="far fa-bookmark"></i>
                Salva</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
