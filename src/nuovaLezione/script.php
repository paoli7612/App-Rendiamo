<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $titolo = $_POST['titolo'];
    $data = $_POST['data'];
    $note = $_POST['note'];
    $etichette = $_POST['etichette'];
    unset($_POST['titolo']);
    unset($_POST['data']);
    unset($_POST['note']);
    unset($_POST['etichette']);
    $errors = newLezione($_UTENTE->id, addslashes($titolo), $data, addslashes($note));
    if ($_POST){
      $lezione = getLezioneTitoloUtente(addslashes($titolo), $_UTENTE->id)[0];
      $_SESSION['create_lezione'] = true;

      foreach (explode(" ", $etichette) as $nome) {
        newEtichetta($nome);
        $etichetta = getEtichettaNome($nome)[0];
        newEtichettaDiLezione($lezione->id, $etichetta->id);
      }


      foreach ($_POST as $idMateria => $value) {
        newMateriaDiLezione($idMateria, $lezione->id);
      }
      if ($errors){
        echo 'esiste gia una lezione con questo titolo da te creata';
      } else {
        //header('Location: /App-Rendiamo/src/lezioni/?id='.$lezione->id);
      }
    } else {
      echo 'nessuna materia selezionata';
    }
  }

?>
