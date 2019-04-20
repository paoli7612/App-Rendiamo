<?php if (isset($_SESSION['wrong_email']) && $_SESSION['wrong_email']): ?>
  <?php $_SESSION['wrong_email'] = false ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Attenzione!</strong> La mail inserita non corrisponde a nessun account.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="$('.alert').alert()">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
<?php if (isset($_SESSION['wrong_password']) && $_SESSION['wrong_password']): ?>
  <?php $_SESSION['wrong_password'] = false ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Attenzione!</strong> La password inserita non è corretta.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="$('.alert').alert()">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
