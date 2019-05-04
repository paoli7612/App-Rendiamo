<?php
  session_start();

  include '../connection.php';

  $titolo = addslashes($_POST['titolo']);
  $note = addslashes($_POST['note']);
  $idUtente = $_SESSION['user_row']['id'];

  query("INSERT INTO lezioni (`idUtente`, `titolo`, `note`, `data`) VALUES ($idUtente, '$titolo', '$note', CURRENT_TIMESTAMP)");
  $lezione = query("SELECT * FROM lezioni WHERE idUtente=$idUtente AND titolo='$titolo'")[0];

  $idLezione = $lezione['id'];
  $notifica = "Nuova lezione creata!";
  $link = "../lezione/?id=$idLezione";
  query("INSERT INTO notifiche (`idUtente`, `testo`, `link`, `data`) VALUES ($idUtente, '$notifica', '$link', CURRENT_TIMESTAMP)");

  $notifica = $_SESSION['user_row']['nome']." ". $_SESSION['user_row']['cognome'] . " ha pubblicato una nuova lezione!";
  $link = "../lezione/?id=$idLezione";
  $studenti = query("SELECT utenti.id
                      FROM utenti, utentiDiUtenti
                      WHERE utenti.id=utentiDiUtenti.idStudente
                        AND utentiDiUtenti.idUtente=$idUtente");
  foreach ($studenti as $studente) {
    $id = $studente['id'];
    query("INSERT INTO notifiche (`idUtente`, `testo`, `link`, `data`) VALUES ($id, '$notifica', '$link', CURRENT_TIMESTAMP)");
  }

  header("Location: ../lezione/?id=".$lezione['id']);
 ?>
