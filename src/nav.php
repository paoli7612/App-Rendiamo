<?php include 'connection.php' ?>
<?php
  session_start();
  if (isset($_SESSION['is_login'])){

  } else {
    header('Location: ../accedi/');
  }
  $idUtente = $_SESSION['user_row']['id'];
?>
<?php $notifiche = query("SELECT testo,link FROM notifiche WHERE idUtente=$idUtente") ?>

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
  <a class="navbar-brand mr-1" href="../index.php">Apprendiamoci</a>
  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
  </button>

  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

  </form>

  <ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="notificheDropDown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <?php if (count($notifiche)): ?>
          <span class="badge badge-danger"><?php echo count($notifiche) ?></span>
        <?php endif; ?>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificheDropDown" onclick="aggiornaNotifiche()">
        <?php if (count($notifiche)): ?>
          <?php foreach ($notifiche as $notifica): ?>
            <a class="dropdown-item" href="<?php if($notifica['link']) echo $notifica['link'] ?>"><?php echo $notifica['testo'] ?></a>
            <div class="dropdown-divider"></div>
          <?php endforeach; ?>
          <a class="dropdown-item" href="#">Segna come lette</a>
        <?php else: ?>
          <a class="dropdown-item">
            Nessuna nuova notifica
          </a>
        <?php endif; ?>
      </div>
    </li>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle fa-fw"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="../account/">
          <?php echo $_SESSION['user_row']['nome']." ".$_SESSION['user_row']['cognome'] ?>
        </a>
        <a class="dropdown-item" href="../impostazioni/">Impostazioni</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Disconnetti</a>
      </div>
    </li>
  </ul>
</nav>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Disconnettersi?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Seleziona "Esci" per terminare la sessione corrente.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annulla</button>
        <a class="btn btn-primary" href="../disconnetti">Esci</a>
      </div>
    </div>
  </div>
</div>
