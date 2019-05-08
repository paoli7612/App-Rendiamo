<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item active">
      Account
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
			Questo è il tuo account. Da qui puoi modificare le impostazioni inerenti alle notifiche e agli aiuti;
			visualizzare docenti o lezioni salvate, e disconnetterti.
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="col-xl-8 col-sm-12">
      <div class="card text-white o-hidden bg-danger">
        <div class="card-body">
          <div class="mr-5">
            <h1>
              <?php echo $_SESSION['user_row']['nome']. " " .$_SESSION['user_row']['cognome']?>
            </h1>
            <h4>
              <?php echo $_SESSION['user_row']['tipo'] ?>
            </h4>
          </div>
        </div>
        <div class="card-footer">
          <?php if ($_SESSION['user_row']['tipo'] != 'studente'): ?>
            <button title="impostazioni" class="btn bg-white" onclick="window.location='../lezioni/?docente=<?php echo $_SESSION['user_row']['id'] ?>'">
              <i class="fas fa-crown"></i> Lezioni create
            </button>
          <?php else: ?>
            <button title="impostazioni" class="btn bg-white" onclick="window.location='../docenti/?salvati'">
              <i class="fas fa-users"></i> Docenti salvati
            </button>
            <button title="impostazioni" class="btn bg-white" onclick="window.location='../lezioni/?salvate'">
              <i class="fas fa-bookmark"></i> Lezioni salvate
            </button>
          <?php endif; ?>
            <button title="impostazioni" class="btn bg-white" onclick="window.location='../impostazioni'">
              <i class="fas fa-cog"></i> Impostazioni
            </button>
            <button title="impostazioni" class="btn bg-white" onclick="window.location='../disconnetti/'">
              <i class="fas fa-sign-out-alt"></i> Disconnetti
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
