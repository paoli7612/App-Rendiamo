<?php include 'connection.php' ?>
<?php
  session_start();
  if (isset($_SESSION['is_login'])){
    $utenti = query("SELECT * FROM utenti WHERE id=".$_SESSION['user_row']['id']);
    if (count($utenti) == 1){
      $_SESSION['user_row'] = $utenti[0];
    } else {
      header('Location: ../disconnetti');
    }
  } else {
    header('Location: ../out/');
  }
  $idUtente = $_SESSION['user_row']['id'];
?>

<br>
<br>
<br>
<nav class="navbar navbar-expand navbar-dark bg-dark mb-3 fixed-top">

  <button class="btn text-white" onclick="window.location='../home/'">
    <i class="fas fa-home fa-lg"></i>
  </button>

  <button class="btn text-white ml-3" onclick="window.location='../filtra/'">
    <i class="fas fa-book fa-lg"></i>
  </button>

  <button class="btn text-white ml-3" onclick="window.location='../docenti/'">
    <i class="fas fa-users fa-lg"></i>
  </button>

  <?php if ($_SESSION['user_type'] == 'studente'): ?>
    <button class="btn text-white ml-3" onclick="window.location='../lezioni/?salvate'">
      <i class="fas fa-bookmark fa-lg"></i>
    </button>

  <?php else: ?>
    <button class="btn text-white ml-3" onclick="window.location='../lezioni/?docente=<?php echo $_SESSION['user_row']['id'] ?>'">
      <i class="fas fa-crown fa-lg"></i>
    </button>

    <button class="btn text-white ml-3" onclick="window.location='../nuovaLezione/'">
      <i class="fas fa-plus fa-lg"></i>
    </button>
  <?php endif; ?>

  <?php
    $notifiche = query("SELECT * FROM notifiche WHERE idUtente=".$_SESSION['user_row']['id']);
    $c = count($notifiche);
  ?>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link" href="#" onclick="$('#dropdownProfilo').toggle()">
        <i class="fas fa-user-circle fa-fw"></i>
        <?php if ($c): ?>
          <span class="badge badge-danger" id="navNotificheN"><?php echo $c ?></span>
        <?php endif; ?>
      </a>
      <div class="dropdown-menu dropdown-menu-right" id="dropdownProfilo">
        <a class="dropdown-item" href="../account/">
          <?php echo $_SESSION['user_row']['nome']." ".$_SESSION['user_row']['cognome'] ?>
        </a>
        <?php if ($_SESSION['user_type'] == 'studente'): ?>
          <a class="dropdown-item" href="../impostazioni/">Impostazioni</a>
          <a class="dropdown-item"
          <?php if (!$_SESSION['user_row']['notifiche']): ?>
            style="display: none"
          <?php endif; ?>
          href="../notifiche/" id="navNotifiche">Notifiche
          <?php if ($c): ?>
            <span class="badge badge-danger"><?php echo $c ?></span>
          <?php endif; ?>
        </a>
        <?php endif; ?>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../disconnetti">Disconnetti</a>
      </div>
    </li>
  </ul>
</nav>
