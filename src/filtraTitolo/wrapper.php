<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      Ricerca testuale
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
            Tramite la ricerca testuale puoi ricercare le lezioni che contengono le parole che inserisci qui sotto.
            Le lezioni che appariranno conterrano il testo ricercato nel titolo o nella lezione.
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="col">
      <form action="../lezioni/" method="GET">
        <div class="card">
          <div class="card-header">
            Ricerca testuale
            <a class="float-right">
              <i class="fas fa-search"></i>
            </a>
          </div>
          <div class="card-body">
            <div class="form-group">
              <div class="form-label-group">
                <input name="ricerca" type="text" class="form-control" placeholder="Ricerca" required="required">
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <button type="submit" class="btn btn-primary float-right">Cerca</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
