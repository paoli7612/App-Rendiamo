<div id="wrapper">

  <?php $title="lezione" ?>
  <?php include '../wrapper_head.php' ?>
  <?php $id = $_GET['id'] ?>
  <?php $lezione = query("SELECT lezioni.* FROM lezioni WHERE lezioni.id=$id ")[0] ?>
  <?php $documenti = query("SELECT * FROM materiali, materialidilezioni WHERE materiali.tipo='Documento' AND materiali.id=materialidilezioni.idMateriale AND materialidilezioni.idLezione=".$lezione['id']) ?>

  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../lezioni/">Lezioni</a>
        </li>
        <li class="breadcrumb-item">
          <a href="../lezione/?id=<?php echo $lezione['id'] ?>"><?php echo $lezione['titolo'] ?></a>
        </li>
        <li class="breadcrumb-item active">Documenti</li>
      </ol>

      <div class="row">
        <?php if ($documenti): ?>
          <?php foreach ($documenti as $documento): ?>
            <div class="col-xl-4 col-sm-12 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-file-pdf"></i>
                  </div>
                  <div class="mr-5"><?php echo $documento['titolo'] ?></div>
                </div>
                  <a class="card-footer text-white clearfix small z-1" href="../../files/<?php echo $documento['indirizzo'] ?>" download>
                    <span class="float-left">Download</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>Nessun Documento caricato</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
