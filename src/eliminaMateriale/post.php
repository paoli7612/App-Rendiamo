<?php
  include '../connection.php';
  session_start();
  $idUtente = $_SESSION['user_row']['id'];
  $idMateriale = $_POST['idMateriale'];
  $materiale = query("SELECT * FROM materiali WHERE id=$idMateriale")[0];
  query("DELETE FROM materiali WHERE id=$idMateriale");

  $titolo = $materiale['titolo'];
  $idLezione = $materiale['idLezione'];
  $lezione = query("SELECT * FROM lezioni WHERE id=$idLezione")[0]['titolo'];

  $link = "../lezioni?id=$idLezione";

  $notifica = $_SESSION['user_row']['nome']." ". $_SESSION['user_row']['cognome'] . " ha eliminato <b>$titolo</b> dalla lezione <b>$lezione</b>!";
  $studenti = query("SELECT utenti.id
                      FROM utenti, utentiDiUtenti
                      WHERE utenti.id=utentiDiUtenti.idStudente
                        AND utentiDiUtenti.idUtente=$idUtente");
  foreach ($studenti as $studente) {
    $id = $studente['id'];
    query("INSERT INTO notifiche (`idUtente`, `testo`, `data`, `link`) VALUES ($id, '$notifica', CURRENT_TIMESTAMP, '$link')");
  }

  header("Location: ../lezione/?id=$idLezione");
 ?>
