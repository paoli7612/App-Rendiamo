<?php
  include "../classes/Utente.php";
  include "../classes/Lezione.php";
  include "../classes/Materia.php";
  include "../classes/Materiale.php";

  function query($sql, $classe){
    $conn = new mysqli("localhost", "root", "", "lele");
    $tabella = array();
    $result = $conn->query($sql);
    //print_r($sql);
    if ($classe=="vuoto"){return $conn->error;}
    if ($result->num_rows == 0) {
      return $tabella;
    } else while($row = $result->fetch_assoc()){
      if ($classe == "utente") $oggetto = new Utente($row);
      elseif ($classe == "lezione") $oggetto = new Lezione($row);
      elseif ($classe == "materia") $oggetto = new Materia($row);
      elseif ($classe == "materiale") $oggetto = new Materiale($row);
      array_push($tabella, $oggetto);
    }
    $conn->close();
    return $tabella;
  }

  include 'select.php';
  include 'insert.php';




?>
