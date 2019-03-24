<?php if (isset($_SESSION['wrong_email']) && $_SESSION['wrong_email']): ?>
  <?php $_SESSION['wrong_email'] = false ?>
    <strong>Attenzione</strong> L'indirizzo email che hai inserito non corrisponde a nessun account.
<?php endif; ?>
<?php if (isset($_SESSION['wrong_password']) && $_SESSION['wrong_password']): ?>
  <?php $_SESSION['wrong_password'] = false ?>
    <strong>Attenzione</strong> La passowrd non è corretta.
<?php endif; ?>
