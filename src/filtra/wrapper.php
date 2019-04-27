<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      Lezioni
    </li>
  </ol>

  <div class="row">
    <?php if ($_SESSION['user_type'] == 'studente' && $_SESSION['user_row']['aiuti']): ?>
      <div class="col-xl-4 col-sm-12 mb-3">
        <div class="card">
          <div class="card-header">
            Aiuto
            <a class="float-right">
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
              <li><b>Lezioni salvate</b>: mostra solo le lezioni gia salvate</li>
            </ul>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="col">
      <div class="row">
        <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
          <button class="btn btn-block btn-primary text-white w-100 p-5" onclick="window.location='../filtraMaterie'">
            <h3 class="float-right">
              Ricerca per materia
            </h3>
            <h1 class="float-left">
              <i class="fas fa-book"></i>
            </h1>
          </button>
        </div>
        <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
          <button class="btn btn-block btn-danger text-white w-100 p-5" onclick="window.location='../filtraDocenti'">
            <h3 class="float-right">
              Ricerca per docente
            </h3>
            <h1 class="float-left">
              <i class="fas fa-users"></i>
            </h1>
          </button>
        </div>
        <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
          <button class="btn btn-block btn-success text-white w-100 p-5">
            <h3 class="float-right">
              Ricerca testuale
            </h3>
            <h1 class="float-left">
              <i class="fas fa-search"></i>
            </h1>
          </button>
        </div>
        <?php if ($_SESSION['user_type'] == 'studente'): ?>
          <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
            <button class="btn btn-block btn-warning text-white w-100 p-5" onclick="window.location='../lezioni/?salvate'">
              <h3 class="float-right">
                Lezioni salvate
              </h3>
              <h1 class="float-left">
                <i class="fas fa-bookmark"></i>
              </h1>
            </button>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
