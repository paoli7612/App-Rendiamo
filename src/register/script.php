<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../query/database.php';
    print_r($_POST);

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $domandaSicurezza = $_POST['domandaSicurezza'];
    $rispostaSicurezza = $_POST['rispostaSicurezza'];

    $errors = newUtente($nome, $cognome, $email, $password, $domandaSicurezza, $rispostaSicurezza);
    if ($errors){
      print_r($errors);
    } else {
      header('Location: ../');
    }
  }

?>
