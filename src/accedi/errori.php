<?php if (isset($_SESSION['wrong_email']) && $_SESSION['wrong_email']): ?>
  <?php $_SESSION['wrong_email'] = false ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Attenzione</strong> L'indirizzo email che hai inserito non corrisponde a nessun account.
    <button onclick="this.parentElement.style.display='none'"
    class="close">&times;</button>
  </div>
<?php endif; ?>
<?php if (isset($_SESSION['wrong_password']) && $_SESSION['wrong_password']): ?>
  <?php $_SESSION['wrong_password'] = false ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Attenzione</strong> La passowrd non è corretta.
    <button onclick="this.parentElement.style.display='none'"
    class="close">&times;</button>
  </div>
<?php endif; ?>
