<?php
  include '../_database/connection.php';

  $titolo = $_GET['titolo'];
  $idUtente = $_GET['utente'];

  $lezioni = getLezioneTitoloUtente($titolo, $idUtente);
  if (count($lezioni)>0){
    $result = false;
  } else {
    $result = true;
  }

  echo json_encode($result);

?>
