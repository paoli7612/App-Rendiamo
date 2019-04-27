<?php

  include '../connection.php';
  session_start();
  $idUtente = $_SESSION['user_row']['id'];
  $idDocente = $_GET['id'];
  $azione = $_GET['azione'];

  if ($azione=="salva"){
    $r = query("INSERT INTO utentiDiUtenti (`idStudente`, `idUtente`) VALUES ($idUtente, $idDocente)");
    echo "ins";
  } else {
    echo "del";
    $r = query("DELETE FROM utentiDiUtenti WHERE idStudente=$idUtente AND idUtente=$idDocente");
  }
  echo $r;
?>
