<?php $idLezione = $_GET['id'] ?>
<?php $lezione = query("SELECT * FROM lezioni WHERE lezioni.id=$idLezione")[0] ?>
<?php $idDocente = $lezione['idUtente']; ?>
<?php $docente = query("SELECT * FROM utenti WHERE utenti.id=$idDocente")[0] ?>
<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="../lezione/?id=<?php echo $lezione['id'] ?>">
        <?php echo $lezione['titolo'] ?>
      </a>
    </li>
    <li class="breadcrumb-item">
      Dettagli
    </li>
  </ol>

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <?php echo $lezione['titolo'] ?>
          <a class="float-right">
            <i class="fas fa-info-circle"></i>
          </a>
        </div>
        <div class="card-body">
          <?php if ($lezione['note']): ?>
            <?php echo $lezione['note'] ?>
          <?php else: ?>
            Nessuna descrizione della lezione
          <?php endif; ?>
        </div>
        <div class="card-footer">
          <?php $materie = query("SELECT * FROM materie, materieDiLezioni WHERE materie.id=materieDiLezioni.idMateria AND materieDiLezioni.idLezione=$idLezione") ?>
          <?php if ($materie): ?>
            <?php foreach ($materie as $materia): ?>
              <?php echo $materia['titolo'] ?>
            <?php endforeach; ?>
          <?php else: ?>
            Nessuna materia
          <?php endif; ?>
          <a class="float-right" title="materie">
            <i class="fas fa-book"></i>
          </a>
        </div>
        <div class="card-footer">
          <?php echo $docente['cognome']." ".$docente['nome'] ?>
          <a class="float-right" title="docente">
            <i class="fas fa-user-graduate"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
