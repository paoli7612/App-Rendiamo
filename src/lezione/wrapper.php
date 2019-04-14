<div id="wrapper">

  <?php $title="lezione" ?>
  <?php include '../wrapper_head.php' ?>
  <?php $id=$_GET['id'] ?>
  <?php
	$lezione = query("SELECT lezioni.* FROM lezioni WHERE lezioni.id=$id ")[0];
  $tipiMateriali = query("SELECT DISTINCT m.tipo from materiali as m, materialidilezioni as d WHERE m.id=d.idMateriale AND d.idLezione=$id");
  $materiali = array();
  foreach ($tipiMateriali as $key => $value) {
    array_push($materiali, $value['tipo']);
  }
  ?>

  <div id="content-wrapper">
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../filtra/">Lezioni</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $lezione['titolo'] ?></li>
      </ol>
      <div class="row">
        <?php if ($lezione['idUtente'] == $_SESSION['user_row']['id']): ?>
          <div class="col-xl-12 col-sm-12 mb-3">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-cogs"></i>
              </div>
              <div class="mr-5">
                <button type="button" name="button" class="btn btn-light" onclick="window.location='../aggiungiMateriali/?id=<?php echo $lezione['id'] ?>'">
                  <i class="fas fa-plus"></i>
                  Aggiungi materiali
                </button>
                <button type="button" name="button" class="btn btn-light" onclick="window.location='../modificaLezione/?id=<?php echo $lezione['id']?>'">
                  <i class="fas fa-edit"></i>
                  Modifica lezione
                </button>
                <button type="button" name="button" class="btn btn-light" onclick="window.location='../eliminaLezione/?conferma=0&id=<?php echo $lezione['id']?>'">
                  <i class="fas fa-edit"></i>
                  Elimina lezione
                </button>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-file-pdf"></i>
              </div>
              <div class="mr-5">Documenti</div>
            </div>
            <?php if (in_array("Documento", $materiali)): ?>
              <a class="card-footer text-white clearfix small z-1" href="../documenti/?id=<?php echo $lezione['id'] ?>">
                <span class="float-left">Visualizza</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            <?php else: ?>
              <a class="card-footer text-white clearfix small z-1">
              <span class="float-left">Nessun documento caricato</span>
            <?php endif; ?>
            </a>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-film"></i>
              </div>
              <div class="mr-5">Video</div>
            </div>
            <?php if (in_array("Video", $materiali)): ?>
              <a class="card-footer text-white clearfix small z-1" href="../video/?id=<?php echo $lezione['id'] ?>">
                <span class="float-left">Visualizza</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            <?php else: ?>
              <a class="card-footer text-white clearfix small z-1">
              <span class="float-left">Nessun video caricato</span>
            <?php endif; ?>
            </a>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-dumbbell"></i>
              </div>
              <div class="mr-5">Esercitazioni</div>
            </div>
            <?php if (in_array("Esercitazione", $materiali)): ?>
              <a class="card-footer text-white clearfix small z-1" href="../esercitazioni/?id=<?php echo $lezione['id'] ?>">
                <span class="float-left">Visualizza</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            <?php else: ?>
              <a class="card-footer text-white clearfix small z-1">
              <span class="float-left">Nessua esercitazione caricata</span>
            <?php endif; ?>
            </a>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-project-diagram"></i>
              </div>
              <div class="mr-5">Presentazioni</div>
            </div>
            <?php if (in_array("Presentazione", $materiali)): ?>
              <a class="card-footer text-white clearfix small z-1" href="../presentazioni/?id=<?php echo $lezione['id'] ?>">
                <span class="float-left">Visualizza</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            <?php else: ?>
              <a class="card-footer text-white clearfix small z-1">
              <span class="float-left">Nessuna presentazione caricata</span>
            <?php endif; ?>
            </a>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-headphones-alt"></i>
              </div>
              <div class="mr-5">Audio</div>
            </div>
            <?php if (in_array("Presentazione", $materiali)): ?>
              <a class="card-footer text-white clearfix small z-1" href="../audio/?id=<?php echo $lezione['id'] ?>">
                <span class="float-left">Visualizza</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            <?php else: ?>
              <a class="card-footer text-white clearfix small z-1">
              <span class="float-left">Nessun autio caricato</span>
            <?php endif; ?>
            </a>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white o-hidden h-100" style="background-color: #e83e8c">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-map"></i>
              </div>
              <div class="mr-5">Mappe concettuali</div>
            </div>
            <?php if (in_array("MappaConcettuale", $materiali)): ?>
              <a class="card-footer text-white clearfix small z-1" href="../mappeConcettuali/?id=<?php echo $lezione['id'] ?>">
                <span class="float-left">Visualizza</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            <?php else: ?>
              <a class="card-footer text-white clearfix small z-1">
              <span class="float-left">Nessuna mappa concettuale caricato</span>
            <?php endif; ?>
            </a>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-ellipsis-v"></i>
              </div>
              <div class="mr-5">Altro</div>
            </div>
            <?php if (in_array("Altro", $materiali)): ?>
              <a class="card-footer text-white clearfix small z-1" href="../altro/?id=<?php echo $lezione['id'] ?>">
                <span class="float-left">Visualizza</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            <?php else: ?>
              <a class="card-footer text-white clearfix small z-1">
              <span class="float-left">Nessuna altro caricato</span>
            <?php endif; ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
