<?php
  session_start();

  include '../connection.php';

  $titolo = addslashes($_POST['titolo']);
  $note = addslashes($_POST['note']);
  $idLezione = $_POST['idLezione'];
  $idUtente = $_SESSION['user_row']['id'];

  if (query("UPDATE lezioni SET titolo='$titolo', note='$note' WHERE id=$idLezione")){
    header("Location: ../lezione/?id=".$lezione['id']);
  } else {
    $lezione = query("SELECT * FROM lezioni WHERE idUtente=$idUtente AND titolo='$titolo'")[0];
    header("Location: ../lezione/?id=".$lezione['id']);
  }
 ?>
