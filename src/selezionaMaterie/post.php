<?php
  session_start();

  include '../connection.php';

  $idLezione = $_POST['idLezione'];
  $idUtente = $_SESSION['user_row']['id'];

  query("DELETE FROM materieDiLezioni WHERE materieDiLezioni.idLezione=$idLezione ");

  unset($_POST['idLezione']);
  foreach ($_POST as $key => $value) {
    query("INSERT INTO materieDiLezioni (`idLezione`,`idMateria`) VALUES ($idLezione, ".endInt($key).")");
  }

  header("Location: ../lezione/?id=".$idLezione);

 ?>

 <a href="../nuovaLezione">O</a>
