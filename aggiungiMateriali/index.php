<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Aggiungi Materiali </title>
  </head>
  <body>
    <?php
      include "../header.php";
      $lezione = getLezioneId($_GET['id']);
      permitProfessore($utente);
      permitLezione($utente, $lezione);
      include "form.html";
      include "script.php";
    ?>



  </body>
</html>
