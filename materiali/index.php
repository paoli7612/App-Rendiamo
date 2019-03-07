<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Materiali </title>
  </head>
  <body>
    <?php include "../header.php"; ?>

    <div class="w3-panel">
      <h1 class="w3-left">Materiali</h1>
      <?php
        if (isset($_GET['id'])){
          include 'dettagli.php';
        } else {
          if ($utente->tipo != 'studente'){
            include 'nuova.php';
          }
          include 'tabella.php';
        }
      ?>
    </div>

  </body>
</html>
