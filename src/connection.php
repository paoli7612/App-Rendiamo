<?php

  function query($sql){
    $conn = new mysqli("localhost", "root", "", "lele");
    //print_r($conn);
    $tabella = array();
    $result = $conn->query($sql);
    //print_r($sql);
    if ($conn->error){
      print_r($conn->error);
    }
    if (isset($result->num_rows)){
      if ($result->num_rows == 0) {
        return $tabella;
      } else while($row = $result->fetch_assoc()){
        array_push($tabella, $row);
      }
      $conn->close();
      return $tabella;
    } else {
      $conn->close();
    }
  }


?>
