<div id="wrapper">

  <?php $title="lezione" ?>
  <?php include '../wrapper_head.php' ?>
  <?php $id=$_GET['id'] ?>
  <?php
	$lezioni = query("SELECT lezioni.* FROM lezioni WHERE lezioni.id=$id ");
	
	if (count($lezioni) == 1){
		$lezione = $lezioni[0];
	} else {
		header('Location: ../errori/');
	}

  ?>

  <div id="content-wrapper">
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../lezioni/">Lezioni</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $lezione['titolo'] ?></li>
      </ol>
      <div class="row">
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
                <button type="button" name="button" class="btn btn-light" disabled="disabled">
                  <i class="fas fa-edit"></i>
                  Modifica lezione
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-file-pdf"></i>
              </div>
              <div class="mr-5">Documenti</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="../documenti/?id=<?php echo $lezione['id'] ?>">
              <span class="float-left">Visualizza</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
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
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Visualizza</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
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
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Visualizza</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
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
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Visualizza</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-life-ring"></i>
              </div>
              <div class="mr-5">Audio</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Visualizza</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
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
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Visualizza</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
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
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Visualizza</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
