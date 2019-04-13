<div id="wrapper">

  <?php $title="home" ?>
  <?php include '../wrapper_head.php' ?>

  <div id="content-wrapper">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Apprendiamoci</h1>
        <p class="lead">Bentornato <?php echo $_SESSION['user_row']['nome'] ?> su Apprendiamoci</p>
      </div>
    </div>
    <div class="container-fluid container marketing">

      <?php if ($_SESSION['user_row']['tipo'] == 'studente'): ?>
        <div class="featurette">
          <div class="row">
            <div class="col-2">
              <button class="btn btn-block" style="height: 100%;" onclick="window.location='../filtra/'">
                <h1>
                  <i class="fas fa-book fa-lg"></i>
                </h1>
              </button>
            </div>
            <div class="col">
              <h3 class="featurette-heading">
                Lezioni
              </h3>
              <p class="lead">Visualizza le lezioni messe a disposizione dai tuoi professori tramite i materiali caricati.</p>
            </div>
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="featurette">
          <div class="row">
            <div class="col-2">
              <button class="btn btn-block" style="height: 100%;" onclick="window.location='../docenti/'">
                <h1>
                  <i class="fas fa-users fa-lg"></i>
                </h1>
              </button>
            </div>
            <div class="col">
              <h3 class="featurette-heading">
                Docenti
              </h3>
              <p class="lead">Memorizza i professori che ti interessano di più per essere sempre aggiornato sulle lezioni che pubblicano.</p>
            </div>
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="featurette">
          <div class="row">
            <div class="col-2">
              <button class="btn btn-block" style="height: 100%;">
                <h1>
                  <i class="fas fa-archive fa-lg"></i>
                </h1>
              </button>
            </div>
            <div class="col">
              <h3 class="featurette-heading">
                Materie
              </h3>
              <p class="lead">Seleziona la materia che ti va di studiare in ogni momento per essere sempre efficente.</p>
            </div>
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="featurette">
          <div class="row">
            <div class="col-2">
              <button class="btn btn-block" style="height: 100%;">
                <h1>
                  <i class="fas fa-tags fa-lg"></i>
                </h1>
              </button>
            </div>
            <div class="col">
              <h3 class="featurette-heading">
                Etichette
              </h3>
              <p class="lead">Ogni lezione può possedere dei tag che rappresentano delle parole chiave per semplificarne la ricerca. </p>
            </div>
          </div>

          <hr class="featurette-divider">

          <div class="featurette">
            <div class="row">
              <div class="col-2">
                <button class="btn btn-block" style="height: 100%;">
                  <h1>
                    <i class="fas fa-question-circle fa-lg"></i>
                  </h1>
                </button>
              </div>
              <div class="col">
                <h3 class="featurette-heading">
                  Aiuti
                </h3>
                <p class="lead">Il sito ti aiuterà a muoverti nelle pagine. Se vuoi disabilitare questa funzionalità puoi farlo da qui.</p>
              </div>
            </div>
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>
