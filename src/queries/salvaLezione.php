<?php

  include '../connection.php';
  session_start();
  $idUtente = $_SESSION['user_row']['id'];
  $idLezione = $_GET['id'];
  $azione = $_GET['azione'];

  if ($azione=="salva"){
    $r = query("INSERT INTO utentiDiLezioni (`idUtente`, `idLezione`) VALUES ($idUtente, $idLezione)");
    echo "ins";
  } else {
    echo "del";
    $r = query("DELETE FROM utentiDiLezioni WHERE idUtente=$idUtente AND idLezione=$idLezione");
  }
  echo $r;
?>
