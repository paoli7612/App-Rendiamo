<ul class="sidebar navbar-nav">
  <li class="nav-item <?php if ($title=='home') echo 'active'?>">
    <a class="nav-link" href="../home">
      <i class="fas fa-fw fa-home"></i>
      <span>Home</span>
    </a>
  </li>
  <li class="nav-item <?php if ($title=='lezioni' || $title=='lezione') echo 'active'?>">
    <a class="nav-link" href="../lezioni">
      <i class="fas fa-fw fa-book"></i>
      <span>Lezioni</span>
    </a>
  </li>
  <li class="nav-item <?php if ($title=='docenti') echo 'active'?>">
    <a class="nav-link" href="../docenti" id="pagesDropdown">
      <i class="fas fa-fw fa-users"></i>
      <span>Docenti</span>
    </a>
  </li>
</ul>
