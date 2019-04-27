<?php include 'connection.php' ?>
<?php
  session_start();
  if (isset($_SESSION['is_login'])){
  } else {
    header('Location: ../out/');
  }
  $idUtente = $_SESSION['user_row']['id'];
?>

<nav class="navbar navbar-expand navbar-dark bg-dark static-top mb-3">

  <button class="btn text-white" onclick="window.location='../home/'">
    <i class="fas fa-home fa-lg"></i>
  </button>

  <button class="btn text-white ml-3" onclick="window.location='../filtra/'">
    <i class="fas fa-book fa-lg"></i>
  </button>

  <button class="btn text-white ml-3" onclick="window.location='../docenti/'">
    <i class="fas fa-users fa-lg"></i>
  </button>

  <?php if ($_SESSION['user_type'] != 'studente'): ?>
    <button class="btn text-white ml-3" onclick="window.location='../lezioni/?docente=<?php echo $_SESSION['user_row']['id'] ?>'">
      <i class="fas fa-crown fa-lg"></i>
    </button>
  <?php endif; ?>


  <ul class="navbar-nav ml-auto">
    <?php if ($_SESSION['user_type'] != 'studente'): ?>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link" href="#" onclick="$('#dropdownNuovo').toggle()">
          <i class="fas fa-plus fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" id="dropdownNuovo">
          <a class="dropdown-item" href="../nuovaLezione">Nuova lezione</a>
        </div>
      </li>
    <?php endif; ?>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link" href="#" onclick="$('#dropdownNotifiche').toggle()">
        <i class="fas fa-bell fa-fw"></i>
        <span class="badge badge-danger">1</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" id="dropdownNotifiche">
        <a class="dropdown-item" href="#">...</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item"></a>
      </div>
    </li>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link" href="#" onclick="$('#dropdownProfilo').toggle()">
        <i class="fas fa-user-circle fa-fw"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" id="dropdownProfilo">
        <a class="dropdown-item" href="../account/">
          <?php echo $_SESSION['user_row']['nome']." ".$_SESSION['user_row']['cognome'] ?>
        </a>
        <a class="dropdown-item" href="../impostazioni/">Impostazioni</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../disconnetti">Disconnetti</a>
      </div>
    </li>
  </ul>
</nav>
