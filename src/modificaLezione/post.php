<?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $idLezione = $lezione['id'];
      $note = $_POST['note'];
      query("UPDATE lezioni SET note='$note' WHERE id=$idLezione");
      header('Location: ../lezione/?id='.$lezione['id']);
  }

?>
