<?php
  session_start();
  if (isset($_SESSION['is_login'])) {
    $_UTENTE = $_SESSION['user_row'];
  } else {
    header('Location: ../accedi/');
  }
?>
