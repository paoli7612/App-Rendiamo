<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $titolo = $_POST['titolo'];
    $data = $_POST['data'];
    $note = $_POST['note'];
    $idUtente = $utente->id;
    unset($_POST['titolo']);
    unset($_POST['data']);
    unset($_POST['note']);
    $errors = newLezione($idUtente, addslashes($titolo), $data, addslashes($note));
    $lezione = getLezioneTitoloUtente(addslashes($titolo), $utente->id);
    $_SESSION['create_lezione'] = true;
    foreach ($_POST as $idMateria => $value) {
      newMateriaDiLezione($idMateria, $lezione->id);
    }
    if ($errors){
      echo 'esiste gia una lezione con questo titolo da te creata';
    } else {
      header('Location: /App-Rendiamo/src/lezioni/?id='.$lezione->id);
    }
  }

?>
