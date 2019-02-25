<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $titolo = $_POST['titolo'];
    $data = $_POST['data'];
    $idUtente = $utente->id;

    $errors = newLezione($idUtente, $titolo, $data);

    if ($errors){
      echo 'esiste gia una lezione con questo titolo da te creata';
    } else {
      header('Location: ..');
    }
  }

?>
