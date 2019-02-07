<?php
  if ($_SERVER['REQUEST_METHOD'] == 'GET'){

  } elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    include "../database.php";
    $utente = getUtenteEmail($email);

    if (count($utente) == 1){
      $utente = $utente[0];
      if ($utente->password == $password){
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['utente'] = $utente->row;
        header('Location: /App-Rendiamo/src/');
      } else {
        echo 'password errata';
      }
    } else {
      echo 'email errata';
    }




  }
?>
