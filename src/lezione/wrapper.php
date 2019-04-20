<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="#" onclick="history.go(-1);">lezioni</a>
    </li>
    <li class="breadcrumb-item">
      Lezioni salvate
    </li>
  </ol>

  <?php $idLezione = $_GET['id'] ?>
  <?php $lezione = query("SELECT * FROM lezioni WHERE lezioni.id=$idLezione")[0] ?>
  <?php $idDocente = $lezione['idUtente']; ?>
  <?php $docente = query("SELECT * FROM utenti WHERE utenti.id=$idDocente")[0] ?>
  <div class="row">
    <div class="col">
      <div class="card bg-secondary">
        <h2 class="card-header text-white"><?php echo $lezione['titolo'] ?></h2>
        <div class="card-body">
          <button class="btn bg-white" disabled="disabled">
            <i class="far fa-bookmark"></i>
            Salva</button>
          <button class="btn bg-white" onclick="window.location='../lezioni/?docente=<?php echo $docente['id'] ?>'">
            <i class="fas fa-user-graduate"></i>
            <?php echo $docente['nome']." ".$docente['cognome'] ?></button>
          <button class="btn bg-white" disabled="disabled">
            <i class="fas fa-info-circle"></i>
            Dettagli</button>
        </div>
      </div>
    </div>
  </div>
</div>
