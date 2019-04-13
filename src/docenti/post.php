<?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idDocente = $_POST['submit'];
    $idUtente = $_SESSION['user_row']['id'];
    if ($_POST['save']){
      query("INSERT INTO utentidiutenti (`idUtente`, `idStudente`, `preferito`) VALUES ($idDocente, $idUtente, TRUE)");
    } else {
      query("DELETE FROM utentidiutenti WHERE idUtente=$idDocente AND idStudente=$idUtente");
    }
    if(isset($_GET['salvati']))
      unset($_GET['salvati']);
  }

?>
