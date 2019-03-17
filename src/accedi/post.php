<?php
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
        $_SESSION['wrong_password'] = true;
      }
    } else {
      $_SESSION['wrong_email'] = true;
    }
  }
?>
