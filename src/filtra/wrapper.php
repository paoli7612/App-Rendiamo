<div id="wrapper">

  <?php $title="lezioni" ?>
  <?php include '../wrapper_head.php' ?>


  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Lezioni</li>
      </ol>
      <div class="row">
        <div class="col-xl-3 col-sm-12 mb-3">
          <div class="card">
            <div class="card-header">
              Aiuto
              <a href="#" class="float-right">
                <i class="fas fa-question-circle"></i>
              </a>
            </div>
            <div class="card-body">
              Qui hai la possibilià di selezionare il metodo di ricerca della lezione. (Ricorda che spesso è più facile tentare)
              <ul>
                <li><b>Ricerca per materia</b>: visualizza tutte le lezioni di una certa materia</li>
                <li><b>Ricerca per docente</b>: scelto un docente, visualizza tutte le lezioni che esso ha creato</li>
                <li><b>Ricerca testuale</b>: ricerca una lezione tramite il titolo</li>
                <li><b>Ricerca avanzata</b>: decidi i parametri di una ricerca mirata ad una o più lezioni</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-9 col-sm-12 ">
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
          <div class="mb-3" onclick="window.location='../ricercaAvanzata/'">
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
