<div id="wrapper">

  <?php $title="lezione" ?>
  <?php include '../wrapper_head.php' ?>


  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Ricerca lezione</li>
      </ol>

      <div class="row">
        <div class="col-xl-12 col-sm-12 mb-3" onclick="window.location='../materie/'">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-book"></i>
              </div>
              <div class="mr-5">Ricerca per materia</div>
            </div>
            <br>
          </div>
        </div>
        <div class="col-xl-12 col-sm-12 mb-3" onclick="window.location='../docenti/'">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-users"></i>
              </div>
              <div class="mr-5">Ricerca per docente</div>
            </div>
            <br>
          </div>
        </div>
        <div class="col-xl-12 col-sm-12 mb-3" onclick="window.location='../lezioni/'">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-search"></i>
              </div>
              <div class="mr-5">Ricerca testuale</div>
            </div>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
