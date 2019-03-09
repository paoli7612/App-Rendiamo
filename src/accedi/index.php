<!DOCTYPE html>
<html>
  <head>
    <?php include '../_head/link.php'; ?>
    <title>Accedi</title>
  </head>
  <body>
    <a href="../registrati/">Non sei ancora registrato? Registrati</a>
    <?php session_start(); ?>
    <?php include '../_database/connection.php'; ?>
    <?php include 'form.php'; ?>
    <?php include 'post.php'; ?>
  </body>
</html>
