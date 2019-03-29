<div id="wrapper">

  <?php $title="docenti" ?>
  <?php include '../wrapper_head.php' ?>
  <?php $docenti = query("SELECT * FROM utenti WHERE tipo='professore'") ?>
  <div id="content-wrapper">
    <div class="container-fluid">
      <?php foreach ($docenti as $docente): ?>
        <div class="row margin">
          <div class="col-md-2">
            <img src="../img/avatar/<?php echo rand(1,5); ?>.png" style="width: 100%" class="rounded float-left">
          </div>
          <div class="col-md-9">
            <div class="row">
              <h1><?php echo $docente['nome']. " " .$docente['cognome'] ?></h1>
            </div>
            <div class="row">
              <h4><?php echo $docente['tipo']?></h1>
            </div>
            <div class="row">
              <a href="../lezioni/?utente=<?php echo $docente['id'] ?>">
                Visualizza lezioni
              </a>
            </div>
          </div>
          <div class="col-md-9">
          </div>
        </div>
        <br>
      <?php endforeach; ?>
    </div>
  </div>
</div>
