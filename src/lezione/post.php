<?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idUtente = $_SESSION['user_row']['id'];
    if ($_POST['submit'] == 'save'){
      query("INSERT INTO utentiDiLezioni (`idUtente`, `idLezione`, `preferito`) VALUES ($idUtente, $id, TRUE)");
    } else {
      query("DELETE FROM utentiDiLezioni WHERE idUtente=$idUtente AND idLezione=$id");
    }
    if(isset($_GET['salvati']))
      unset($_GET['salvati']);
  }

?>
