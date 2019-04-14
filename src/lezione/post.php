<?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idUtente = $_SESSION['user_row']['id'];
    if ($_POST['submit'] == 'save'){
      query("INSERT INTO utentidilezioni (`idUtente`, `idLezione`, `preferito`) VALUES ($idUtente, $id, TRUE)");
    } else {
      query("DELETE FROM utentidilezioni WHERE idUtente=$idUtente AND idLezione=$id");
    }
    if(isset($_GET['salvati']))
      unset($_GET['salvati']);
  }

?>
