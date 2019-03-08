<?php
  session_start();

  if (isset($_SESSION['is_login'])) {
    $_UTENTE = new Utente($_SESSION['user_row']);
  } else {
    header('Location: ../accedi/');
  }
?>
