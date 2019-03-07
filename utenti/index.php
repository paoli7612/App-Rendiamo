<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Utenti </title>
  </head>
  <body>
    <?php include "../header.php"; ?>
    <?php permitAdmin($utente); ?>
    <?php include 'tabella.php' ?>
  </body>
</html>
