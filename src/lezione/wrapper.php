<?php $idUtente = $_SESSION['user_row']['id'] ?>
<?php $idLezione = $_GET['id'] ?>
<?php $lezione = query("SELECT lezioni.*, utentidilezioni.idUtente as preferito
                        FROM (
                          SELECT *
                          FROM lezioni
                          WHERE lezioni.id=$idLezione
                        ) AS lezioni
                        LEFT JOIN utentidilezioni
                          ON (utentidilezioni.idLezione=lezioni.id
                              AND utentidilezioni.idUtente=$idUtente)")[0] ?>
<?php $idDocente = $lezione['idUtente']; ?>
<?php $docente = query("SELECT * FROM utenti WHERE utenti.id=$idDocente")[0] ?>
<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      <?php echo $lezione['titolo'] ?>
    </li>
  </ol>

  <div class="row">
    <div class="col">
      <?php include 'opzioni.php' ?>
    </div>
  </div>
</div>
