<?php
  include '../connection.php';
  session_start();
  $idUtente = $_SESSION['user_row']['id'];
  $idLezione = $_POST['idLezione'];
  $lezione = query("SELECT * FROM lezioni WHERE id=$idLezione AND lezioni.idUtente=$idUtente")[0];
  query("DELETE FROM lezioni WHERE id=$idLezione AND lezioni.idUtente=$idUtente");

  $titolo = $lezione['titolo'];

  $notifica = $_SESSION['user_row']['nome']." ". $_SESSION['user_row']['cognome'] . " ha eliminato la lezione <b>$titolo</b>!";
  $studenti = query("SELECT utenti.id
                      FROM utenti, utentiDiUtenti
                      WHERE utenti.id=utentiDiUtenti.idStudente
                        AND utentiDiUtenti.idUtente=$idUtente");
  foreach ($studenti as $studente) {
    $id = $studente['id'];
    query("INSERT INTO notifiche (`idUtente`, `testo`, `data`) VALUES ($id, '$notifica', CURRENT_TIMESTAMP)");
  }

  header("Location: ../home/");
 ?>
