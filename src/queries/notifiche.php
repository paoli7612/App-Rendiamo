<?php

  include '../connection.php';
  session_start();
  $idUtente = $_SESSION['user_row']['id'];
  $azione = $_GET['k'];

  if (!$azione){ // disabilita
    $r = query("UPDATE utenti
            SET notifiche=0
            WHERE id=$idUtente;");
  } else { // abilita
    $r = query("UPDATE utenti
            SET notifiche=1
            WHERE id=$idUtente;");
  }
  $_SESSION['user_row']['notifiche']=$azione;
  header('Location: ../impostazioni/');
?>
