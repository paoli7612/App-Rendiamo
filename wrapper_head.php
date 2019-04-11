<ul class="sidebar navbar-nav">
  <li class="nav-item <?php if ($title=='home') echo 'active'?>">
    <a class="nav-link" href="../home">
      <i class="fas fa-fw fa-home"></i>
      <span>Home</span>
    </a>
  </li>
  <li class="nav-item <?php if ($title=='lezioni' || $title=='lezione' || $title=='materie') echo 'active'?>">
    <a class="nav-link" href="../materie">
      <i class="fas fa-fw fa-book"></i>
      <span>Materie e lezioni</span>
    </a>
  </li>
  <?php if ($_SESSION['user_type'] == 'studente'): ?>
  <?php else: ?>
    <li class="nav-item <?php if ($title=='nuovaLezione') echo 'active'?>">
      <a class="nav-link" href="../nuovaLezione/">
        <i class="fas fa-fw fa-plus"></i>
        <span>Nuova lezione</span>
      </a>
    </li>
  <?php endif; ?>
  <li class="nav-item <?php if ($title=='docenti') echo 'active'?>">
    <a class="nav-link" href="../docenti" id="pagesDropdown">
      <i class="fas fa-fw fa-users"></i>
      <span>Docenti</span>
    </a>
  </li>
</ul>

<script src="../wrapper_header.js"></script>
