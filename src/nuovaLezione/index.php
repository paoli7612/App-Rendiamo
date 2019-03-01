<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Home </title>
  </head>
  <body>
    <?php include "../header.php"; ?>
    <?php permitProfessore($utente); ?>
    <?php $materie = getMaterie(); ?>
    <?php include "form.php"; ?>
    <?php include "script.php"; ?>

  </body>
</html>
