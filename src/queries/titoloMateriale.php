<?php
  session_start();
  include "../connection.php";

  $titolo = addslashes($_GET['titolo']);
  $idUtente = $_SESSION['user_row']['id'];
  $idLezione = $_GET['idLezione'];

  $q['materiale'] = count(query("SELECT * FROM materiali WHERE titolo='$titolo' AND idLezione=$idLezione"));

  echo json_encode($q);

?>
