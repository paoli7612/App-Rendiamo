<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Home </title>
  </head>
  <body>
    <?php include "../header.php"; ?>
    <h1>Nuova lezione</h1>
    <?php permitProfessore($utente); ?>
    <?php include "form.html"; ?>
    <?php include "script.php"; ?>

  </body>
</html>
