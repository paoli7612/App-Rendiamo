<?php
  include '../connection.php';
  session_start();
  $idUtente = $_SESSION['user_row']['id'];

  print_r(query("DELETE FROM notifiche WHERE idUtente=$idUtente"));
  header("Location: ".$_GET['link']);


?>
