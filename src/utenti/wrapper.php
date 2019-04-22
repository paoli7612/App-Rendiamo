<?php $utenti = query("SELECT * FROM utenti") ?>
<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      Gestisci utenti
    </li>
  </ol>

  <div class="row">
    <?php foreach ($utenti as $utente): ?>
      <div class="col-xl-4 col-sm-12 col-md-6">
        <div class="card mb-3">
          <div class="card-header">
            <?php echo $utente['cognome'] ?>
            <?php echo $utente['nome'] ?>
            <a class="float-right">
              <?php if ($utente['tipo'] == 'admin'): ?>
                <i class="fas fa-user-graduate"></i>
              <?php elseif ($utente['tipo'] == 'professore'): ?>
                <i class="fas fa-user-tie"></i>
              <?php else: ?>
                <i class="fas fa-user"></i>
              <?php endif; ?>
            </a>
          </div>
          <div class="card-body row">
            <div class="col-6">
              <?php if ($utente['tipo'] == 'admin'): ?>
              <?php elseif ($utente['tipo'] == 'professore'): ?>
                <button class="btn btn-block btn-primary">
                  <i class="fas fa-book"></i> Visualizza lezioni
                </button>
              <?php else: ?>
                <button class="btn btn-block btn-primary">
                  <i class="fas fa-arrow-up"></i> Promuovi
                </button>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
