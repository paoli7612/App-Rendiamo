<?php


  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $titolo = $_POST['titolo'];
    $note = $_POST['note'];
    $idUtente = $_SESSION['user_row']['id'];

    $res = query("INSERT INTO lezioni (`idUtente`, `titolo`, `data`, `note`)
      VALUES ('$idUtente', '$titolo', CURRENT_TIMESTAMP, '$note')");

    $idLezione = query("SELECT id FROM lezioni WHERE idUtente=$idUtente AND '$titolo'=titolo")[0]['id'];

    unset($_POST['titolo']);
    unset($_POST['note']);

    $idMaterie = array();
    $nomeEtichette = array();

    foreach ($_POST as $key => $value) {
      if (startsWith($key, 'materia_')){
        array_push($idMaterie, endInt($key));
      } elseif (startsWith($key, 'etichetta_')){
        array_push($nomeEtichette, $value);
      }
    }

    if (count($idMaterie)) {
      $str = "";
      foreach ($idMaterie as $i) {
        $str .= "(".$i.", ".$idLezione."),";
      }
      $str = substr($str, 0, -1);
      query("INSERT INTO materiedilezioni (`idMateria`,`idLezione`)
      VALUES". $str);
    }

    if (count($nomeEtichette)) {
      foreach ($nomeEtichette as $n) {
        query("INSERT INTO etichette (`nome`) VALUES ('$n');");
      }

      $str = "(";
      foreach ($nomeEtichette as $n) {
        $str .= "'".$n."',";
      }
      $str[-1] = ")";
      print_r($str);

      $idEtichette = query("SELECT id FROM etichette WHERE nome IN $str");
      print_r($idEtichette);
    }
    if ($res){
      print_r("ERRORE NELLA CREAZIONE DELLA LEZIONE");
    } else {
      header('Location: ../lezione/?id='.$idLezione);
    }

  }
?>
