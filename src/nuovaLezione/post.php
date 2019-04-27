<?php
session_start();

  include '../connection.php';

  $titolo = addslashes($_POST['titolo']);
  $note = addslashes($_POST['note']);
  $idUtente = $_SESSION['user_row']['id'];

  if (query("INSERT INTO lezioni (`idUtente`, `titolo`, `note`) VALUES ($idUtente, '$titolo', '$note')")){
    header("Location: ../lezioni/?errore");
  } else {
    $lezione = query("SELECT * FROM lezioni WHERE idUtente=$idUtente AND titolo='$titolo'")[0];
    header("Location: ../lezione/?id=".$lezione['id']);
  }
 ?>
