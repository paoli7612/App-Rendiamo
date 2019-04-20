<?php
  session_start();
  include "../connection.php";

  $titolo = addslashes($_GET['titolo']);
  $idUtente = $_SESSION['user_row']['id'];
  $q['lezione'] = count(query("SELECT * FROM lezioni WHERE titolo='$titolo' AND idUtente=$idUtente"));

  echo json_encode($q);

?>
