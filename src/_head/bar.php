<?php ob_start(); ?>

<?php
function endsWith($string, $endString)
{
    $len = strlen($endString);
    return (substr($string, -$len) === $endString);
}

?>
<div class="w3-bar w3-blue w3-xlarge">
  <a class="navbar-brand" href="../home/">
    <button
      <?php if (endsWith($_SERVER['REQUEST_URI'], '/home/' )): ?>
        class="w3-button w3-bar-item w3-white"
        <?php else: ?>
        class="w3-button w3-bar-item"
      <?php endif; ?>>
      <i class="fas fa-home fa fa-fw"></i>
      <span class="w3-hide-small">Home</span>
    </button>
  </a>
  <a class="navbar-brand" href="../lezioni/">
    <button
      <?php if (endsWith($_SERVER['REQUEST_URI'], '/lezioni/' )): ?>
        class="w3-button w3-bar-item w3-white"
        <?php else: ?>
        class="w3-button w3-bar-item"
      <?php endif; ?>>
      <i class="fas fa-book fa fa-fw"></i>
      <span class="w3-hide-small">Lezioni</span>
    </button>
  </a>
  <a class="navbar-brand" href="../account/">
    <button
      <?php if (endsWith($_SERVER['REQUEST_URI'], '/account/' )): ?>
        class="w3-button w3-bar-item w3-white"
        <?php else: ?>
        class="w3-button w3-bar-item"
      <?php endif; ?>>
      <i class="fas fa-user fa fa-fw"></i>
      <span class="w3-hide-small">Account</span>
    </button>
  </a>
  <?php if ($_UTENTE->row['tipo'] == 'admin'): ?>
    <a class="navbar-brand" href="../pannelloDiControllo/">
      <button
      <?php if (endsWith($_SERVER['REQUEST_URI'], '/pannelloDiControllo/' )): ?>
        class="w3-button w3-bar-item w3-white w3-right"
        <?php else: ?>
        class="w3-button w3-bar-item w3-right"
      <?php endif; ?>>
      <i class="fas fa-toolbox fa fa-fw"></i>
		<span class="w3-hide-small">Admin</span>
      </button>
    </a>
  <?php endif; ?>
</div>
