<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Rimuovi </title>
  </head>
  <body>
    <?php include "../header.php"; ?>
    <?php

      if (isset($_GET['idLezione'])){
        $lezione = getLezioneId($_GET['idLezione']);
        if ($lezione->idUtente == $utente->id){
          include 'lezione.php';
        } else {
          header('Location: ../error/?type=permesso');
        }
      }

    ?>

  </body>
</html>
