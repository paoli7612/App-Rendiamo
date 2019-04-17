<div id="wrapper">

  <?php $title="lezione" ?>
  <?php include '../wrapper_head.php' ?>
  <?php $idTipo=$_GET['materiale'] ?>
  <?php $idLezione=$_GET['lezione'] ?>
  <?php $tipo = query("SELECT * FROM tipiMateriali WHERE titolo='$idTipo'")[0] ?>
  <?php $lezione = query("SELECT * FROM lezioni WHERE id=$idLezione")[0] ?>
  <div id="content-wrapper">
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../filtra/">Lezioni</a>
        </li>
        <li class="breadcrumb-item active">
          <a href="../lezione/?id=<?php echo $lezione['id'] ?>"></a>
          <?php echo $lezione['titolo'] ?>
        </li>
        <li class="breadcrumb-item active">
          <?php echo $tipo['plurale'] ?>
        </li>
      </ol>

      <?php $materiali = query("SELECT * FROM materiali, materialiDiLezioni WHERE idTipo=".$tipo['id']." AND materialiDiLezioni.idLezione=".$lezione['id']." AND materialiDiLezioni.idMateriale=materiali.id") ?>
      <?php foreach ($materiali as $materiale): ?>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-<?php echo $tipo['colore']?> o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-fw <?php echo $tipo['icona'] ?>"></i>
              </div>
              <div class="mr-5"><?php echo $materiale['titolo'] ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="../../files/<?php echo $materiale['indirizzo'] ?>" download="download">
              <span class="float-left">Scarica</span>
              <span class="float-right">
                <i class="fas fa-angle-down"></i>
              </span>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
