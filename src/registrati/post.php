<?php

    include '../connection.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (endsWith(strtoupper($email), strtoupper('scuole.provincia.tn.it'))) {
      query("INSERT INTO utenti (`nome`, `cognome`, `email`, `password`, `tipo`) VALUES ('$nome', '$cognome', '$email', SHA('$password'), 'professore')");
    } else {
      query("INSERT INTO utenti (`nome`, `cognome`, `email`, `password`) VALUES ('$nome', '$cognome', '$email', SHA('$password'))");
    }


    header("Location: ../accedi/?email=$email");

  }

?>
