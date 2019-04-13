<div id="wrapper">
  <?php $title="account" ?>
  <?php include '../wrapper_head.php' ?>
  <?php  $id=$_SESSION['user_row']['id'] ?>
  <?php $utente = query("SELECT * FROM utenti WHERE id=$id")[0] ?>
  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Account</a>
        </li>
      </ol>
      <div class="row">
        <div class="col-xl-4 col-sm-12 mb-3">
          <?php include 'aiuto.php' ?>
        </div>
        <div class="col-xl-8 col-sm-12">
          <div class="card text-white o-hidden bg-primary">
            <div class="card-body">
              <div class="card-body-icon">
                <?php if ($utente['tipo'] == 'admin'): ?>
                  <i class="fas fa-user-graduate"></i>
                <?php else: ?>
                  <i class="fas fa-user"></i>
                <?php endif; ?>
              </div>
              <div class="mr-5">
                <h1>
                  <?php echo $utente['nome']. " " .$utente['cognome']?>
                </h1>
                <h4>
                  <?php echo $utente['tipo'] ?>
                </h4>
              </div>
            </div>
            <div class="card-footer">
              <?php if ($utente['tipo'] != 'studente'): ?>
                <button title="impostazioni" class="btn bg-white" onclick="window.location='../lezioni/?utente=<?php echo $utente['id'] ?>'">
                  <i class="fas fa-sign-out-alt"></i> Lezioni create
                </button>
              <?php else: ?>
                <button title="impostazioni" class="btn bg-white" onclick="window.location='../docenti/?salvati'">
                  <i class="fas fa-users"></i> Docenti salvati
                </button>
                <button title="impostazioni" class="btn bg-white" onclick="window.location='../lezioniSalvate'" disabled="disabled">
                  <i class="fas fa-tags"></i> Lezioni salvate
                </button>
              <?php endif; ?>
              <button title="impostazioni" class="btn bg-white" onclick="window.location='../impostazioni'">
                <i class="fas fa-cog"></i> Impostazioni
              </button>
              <button title="impostazioni" class="btn bg-white" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt"></i> Disconnetti
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
