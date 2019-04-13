<?php

    include '../connection.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    print_r($_POST);
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    query("INSERT INTO utenti (`nome`, `cognome`, `email`, `password`) VALUES ('$nome', '$cognome', '$email', SHA('$password'))");

    header("Location: ../accedi/?email=$email");

  }

?>
