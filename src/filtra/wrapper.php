<div id="wrapper">

  <?php $title="lezioni" ?>
  <?php include '../wrapper_head.php' ?>


  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Lezioni</li>
      </ol>
      <div class="row">
        <?php if ($_SESSION['user_type'] == 'studente'): ?>
          <div class="col-xl-3 col-sm-12 mb-3">
            <?php include 'aiuto.php' ?>
          </div>
          <div class="col-xl-9 col-sm-12 ">
          <?php else: ?>
          <div class="col-xl-12 col-sm-12 ">
        <?php endif; ?>
          <div class="mb-3" onclick="window.location='../filtraMaterie/'">
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
          <div class="mb-3" onclick="window.location='../filtraDocenti/'">
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
          <div class="mb-3" onclick="window.location='../lezioni/'">
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
          <div class="mb-3" title="disabilitato" onclick="window.location='../ricercaAvanzata/'">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-sliders-h"></i>
                </div>
                <div class="mr-5">Ricerca avanzata</div>
              </div>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
