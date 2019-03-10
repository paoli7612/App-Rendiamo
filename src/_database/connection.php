<?php
  include '../_classes/lezione.php';
  include '../_classes/materiale.php';
  include '../_classes/tema.php';
  include '../_classes/utente.php';
  include '../_classes/materia.php';
  include '../_classes/etichetta.php';

  function query($sql, $className){
    $conn = new mysqli("localhost", "root", "", "lele");
    //print_r($conn);
    $tabella = array();
    $result = $conn->query($sql);
    //print_r($sql);
    if ($conn->error){
      print_r($conn->error);
    }
    if ($className == "vuoto"){
      //print_r($conn->error);
      return $conn->error;
    }
    if ($result->num_rows == 0) {
      return $tabella;
    } else while($row = $result->fetch_assoc()){
      if ($className == "utente") $oggetto = new Utente($row);
      elseif ($className == "lezione") $oggetto = new Lezione($row);
      elseif ($className == "tema") $oggetto = new Tema($row);
      elseif ($className == "materiale") $oggetto = new Materiale($row);
      elseif ($className == "materia") $oggetto = new Materia($row);
      elseif ($className == "etichetta") $oggetto = new Etichetta($row);
      array_push($tabella, $oggetto);
    }
    $conn->close();
    return $tabella;
  }

  include 'select.php';
  include 'insert.php';
  include 'update.php';


?>
