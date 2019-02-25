<?php
  function login($utente){
    session_destroy();
    session_start();
    $_SESSION['login'] = true;
    $_SESSION['utente'] = $utente->row;
    $_SESSION['utente_tipo'] = $utente->tipo;
    header('Location: ..');
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../query/database.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $utenti = getUtenteEmail($email);

    if ($utenti){
      $utente = $utenti[0];
      if ($utente->password == $password){
        login($utente);
      } else {
        echo 'email errata';
      }
    } else {
      echo 'email errata';
    }

  }

?>
