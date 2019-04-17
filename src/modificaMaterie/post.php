<?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idLezione = $_GET['id'];
    print_r($_POST);

    query("DELETE FROM materieDiLezioni WHERE materieDiLezioni.idLezione=$idLezione");

    $idMaterie = array();
    foreach ($_POST as $key => $value) {
      if (startsWith($key, 'materia_')){
        array_push($idMaterie, endInt($key));
      }
    }

    if (count($idMaterie)) {
      $str = "";
      foreach ($idMaterie as $i) {
        $str .= "(".$i.", ".$idLezione."),";
      }
      $str = substr($str, 0, -1);
      query("INSERT INTO materieDiLezioni (`idMateria`,`idLezione`)
      VALUES". $str);
    }

    header("Location: ../lezione/?id=$idLezione");

  }


?>
