<?php if (isset($_SESSION['wrong_email']) && $_SESSION['wrong_email']): ?>
  <?php $_SESSION['wrong_email'] = false ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="$('.alert').alert()">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
<?php if (isset($_SESSION['wrong_password']) && $_SESSION['wrong_password']): ?>
  <?php $_SESSION['wrong_password'] = false ?>
    <b>Attenzione</b> La passowrd non è corretta.
<?php endif; ?>
