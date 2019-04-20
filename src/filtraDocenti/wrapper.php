<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      Docenti
    </li>
  </ol>

  <div class="row">
    <?php $docenti = query("SELECT utenti.*, COUNT(lezioni.id) as count FROM utenti, lezioni WHERE lezioni.idUtente=utenti.id GROUP BY utenti.id") ?>
    <?php foreach ($docenti as $docente): ?>
    <div class="col-xl-6 col-sm-6 mb-3">
      <button class="btn btn-block btn-danger h-100 p-3 mb-3" onclick="window.location='../lezioni/?docente=<?php echo $docente['id'] ?>'">
        <div class="float-right">
          <i class="fa-lg fas fa-user"></i>
        </div>
        <div class="float-left">
          <?php echo $docente['nome']. " " .$docente['cognome']?>
          (<?php echo $docente['count'] ?>)
        </div>
      </button>
		</div>
  <?php endforeach; ?>
  </div>
</div>
