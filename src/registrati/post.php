<?php
  session_destroy();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $domandaSicurezza = $_POST['domandaSicurezza'];
    $rispostaSicurezza = $_POST['rispostaSicurezza'];

    $utente = getUtenteEmail($email);
    if ($utente){
      echo 'utente gia esistente';
    } else {
      newUtente($email,$password,$nome,$cognome,$domandaSicurezza,$rispostaSicurezza);
      header('Location: ../accedi/?email='.$email);
    }
  }
?>
