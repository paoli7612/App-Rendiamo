<?php
  include '../connection.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $utente = query("SELECT id FROM utenti WHERE email='$email'");
    if ($utente){
      $utente = query("SELECT * FROM utenti WHERE email='$email' AND password=SHA('$password')");
      if ($utente){
        session_start();
        $_SESSION['is_login'] = true;
        $_SESSION['user_row'] = $utente[0];
        $_SESSION['user_type'] = $utente[0]['tipo'];
        header('Location: ../home/');
      } else {
        $_SESSION['wrong_password'] = true;
      }
    } else {
      $_SESSION['wrong_email'] = true;
    }
  }
?>
