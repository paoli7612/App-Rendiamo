<?php
  include '../_classes/lezione.php';
  include '../_classes/materiale.php';
  include '../_classes/tema.php';
  include '../_classes/utente.php';
  include '../_classes/materia.php';

  function query($sql, $className){
    $conn = new mysqli("localhost", "root", "", "lele");
    //print_r($conn);
    $tabella = array();
    $result = $conn->query($sql);
    //print_r($sql);
    if ($classe == "vuoto" || $conn->error){
      //print_r($conn->error);
      return $conn->error;
    }
    if ($result->num_rows == 0) {
      return $tabella;
    } else while($row = $result->fetch_assoc()){
      if ($classe == "utente") $oggetto = new Utente($row);
      elseif ($classe == "lezione") $oggetto = new Lezione($row);
      elseif ($classe == "tema") $oggetto = new Tema($row);
      elseif ($classe == "materiale") $oggetto = new Materiale($row);
      elseif ($classe == "materia") $oggetto = new Materia($row);
      array_push($tabella, $oggetto);
    }
    $conn->close();
    return $tabella;
  }


?>
