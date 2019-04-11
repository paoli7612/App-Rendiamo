<?php

  include "../connection.php";

  $titolo = $_GET['titolo'];
  $idUtente = $_GET['idUtente'];

  $q['lezione'] = count(query("SELECT * FROM lezioni WHERE titolo='$titolo' AND idUtente=$idUtente"));

  echo json_encode($q);

?>
