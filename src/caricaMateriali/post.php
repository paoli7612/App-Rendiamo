<?php

  include '../connection.php';

  $titolo = $_POST['titolo'];
  $idTipo = $_POST['tipo'];
  $idLezione = $_POST['idLezione'];

  $file = $_FILES['in_file'];

  if ($dile['size'] < 500000) {
    query("INSERT INTO materiali (`titolo`, `idTipo`, `idLezione`) VALUES ('$titolo', $idTipo, $idLezione)");

    $idMateriale = query("SELECT id from materiali WHERE titolo='$titolo' AND idLezione=$idLezione")[0]['id'];
    echo $idMateriale;

    $cartella = '../../files/'.$idMateriale.'/';
    if (!file_exists($cartella)) {
      mkdir($cartella);
    }
    $indirizzo = $cartella.$titolo;
    move_uploaded_file($file["tmp_name"], $indirizzo);

  }

  header('Location: ../lezione/?id='.$idLezione);


?>
