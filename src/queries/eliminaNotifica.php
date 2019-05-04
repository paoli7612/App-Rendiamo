<?php

  session_start();

  include '../connection.php';

  $idNotifica = $_GET['id'];
  $idUtente = $_SESSION['user_row']['id'];

  query("DELETE FROM notifiche WHERE id=$idNotifica AND idUtente=$idUtente");

?>
