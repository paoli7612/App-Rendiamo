<?php
  if ($_SERVER['REQUEST_METHOD'] == 'GET'){

  } elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $domandaSicurezza = $_POST['domandaSicurezza'];
    $rispostaSicurezza = $_POST['rispostaSicurezza'];
    $tipo = $_POST['tipo'];
    $anno = $_POST['anno'];

    include "../database.php";
    $error = newUtente($nome, $cognome, $email, $password, $domandaSicurezza, $rispostaSicurezza, $tipo, $anno);

    if ($error){
      print_r($error);
    } else {
      header('Location: /App-Rendiamo/src/');
    }




  }
?>
