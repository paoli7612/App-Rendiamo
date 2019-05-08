<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../head.html' ?>
    <title>Dettagli</title>
  </head>
  <body>
    <?php include '../nav.php' ?>
    <?php
      $id = $_GET['id'];
      $lezioni = query("SELECT lezioni.*, utenti.nome, utenti.cognome FROM lezioni, utenti WHERE utenti.id=lezioni.idUtente AND lezioni.id=$id");
      if (count($lezioni) == 1){
        $lezione = $lezioni[0];
      } else {
        header('Location: ../lezioneInesistente');
      }
    ?>

    <?php include 'wrapper.php' ?>

  </body>
</html>
