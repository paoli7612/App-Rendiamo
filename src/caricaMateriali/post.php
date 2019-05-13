<?php
  session_start();
  include '../connection.php';

  $titolo = $_POST['titolo'];
  $idTipo = $_POST['tipo'];
  $idLezione = $_POST['idLezione'];
  $file = $_FILES['in_file'];
  $dimensione = $file['size'];
	echo $dimensione;
  if ($dimensione > 1000000000) {
    header('Location: ../home?error_size_file');
  }

  query("INSERT INTO materiali (`titolo`, `idTipo`, `idLezione`, `dimensione`, `data`) VALUES ('$titolo', $idTipo, $idLezione, $dimensione, CURRENT_DATE)");

  $idMateriale = query("SELECT id from materiali WHERE titolo='$titolo' AND idLezione=$idLezione")[0]['id'];
  echo $idMateriale;

  $cartella = '../../files/'.$idMateriale.'/';
  if (!file_exists($cartella)) {
    mkdir($cartella);
  }
  $indirizzo = $cartella.$titolo;
  move_uploaded_file($file["tmp_name"], $indirizzo);

  $lezione = query("SELECT * from lezioni WHERE id=$idLezione")[0];
  $titoloLezione = $lezione['titolo'];
  $notifica = $_SESSION['user_row']['nome']." ". $_SESSION['user_row']['cognome'] . " ha caricato <b>$titolo</b> nella lezione <b>$titoloLezione</b>!";
  $idUtente = $_SESSION['user_row']['id'];

  $link = "../materiali/?id=$idLezione&tipo=$idTipo";
  $studenti = query("SELECT utenti.id
                      FROM utenti, utentiDiLezioni
                      WHERE utenti.id=utentiDiLezioni.idUtente
                        AND utentiDiLezioni.idLezione=$idLezione");
  foreach ($studenti as $studente) {
    $id = $studente['id'];
    query("INSERT INTO notifiche (`idUtente`, `testo`, `link`, `data`) VALUES ($id, '$notifica', '$link', CURRENT_TIMESTAMP)");
  }

  header('Location: ../lezione/?id='.$idLezione);


?>
