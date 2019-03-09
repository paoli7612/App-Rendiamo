<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuovaPassword = $_POST['nuovaPassword'];
    $vecchiaPassword = $_POST['vecchiaPassword'];
    $utente = getUtenteEmailPassword($_UTENTE->row['email'], $vecchiaPassword);
    if ($utente){
      $errors = editPasswordIdUtente($_UTENTE->id, $nuovaPassword);
      header('Location: ../accedi');
    } else {
      echo 'vecchia password errata';
    }
  }
?>
