<?php
  include '../connection.php';

  $idLezione = $_POST['idLezione'];
  query("DELETE FROM lezioni WHERE id=$idLezione");
  header("Location: ../home/")

 ?>
