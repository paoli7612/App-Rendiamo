<?php
  session_destroy();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $utente = getUtenteEmail($email);
    if ($utente){
      $utente = getUtenteEmailPassword($email, $password);
      if ($utente){
        session_start();
        $_SESSION['is_login'] = true;
        $_SESSION['user_row'] = $utente[0];
        header('Location: ../home/');
      } else {
        $_SESSION['error'] = 'password';
      }
    } else {
      $_SESSION['error'] = 'email';
    }
  }
?>
