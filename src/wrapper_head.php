<ul class="sidebar navbar-nav">
  <li class="nav-item <?php if ($title=='home') echo 'active'?>">
    <a class="nav-link" href="../home">
      <i class="fas fa-fw fa-home"></i>
      <span>Home</span>
    </a>
  </li>
  <li class="nav-item <?php if ($title=='lezioni') echo 'active'?>">
    <?php if ($title=='lezioni'): ?>
      <a class="nav-link" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
    <?php else: ?>
        <a class="nav-link" href="../filtra/">
    <?php endif; ?>
      <i class="fas fa-fw fa-book"></i>
      <span>Lezioni</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <a class="dropdown-item" href="../filtraDocenti/">Docenti</a>
      <a class="dropdown-item" href="../filtraMaterie/">Materie</a>
      <a class="dropdown-item" href="../lezioni/">Testuale</a>
      <a class="dropdown-item" href="../ricercaAvanzata/">Ricerca avanzata</a>
    </div>
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
