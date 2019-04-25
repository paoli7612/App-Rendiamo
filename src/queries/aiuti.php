<?php

  include '../connection.php';
  session_start();
  $idUtente = $_SESSION['user_row']['id'];
  $azione = $_GET['k'];

  if (!$azione){ // disabilita
    $_SESSION['user_row']['aiuti'] = 0;
    query("UPDATE utenti
            SET aiuti=0
            WHERE id=$idUtente;");
  } else { // abilita
    $_SESSION['user_row']['aiuti'] = 1;
    query("UPDATE utenti
            SET aiuti=1
            WHERE id=$idUtente;");
  }
?>
