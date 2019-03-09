<!DOCTYPE html>
<html>
  <head>
    <?php include '../_head/link.php'; ?>
    <title>Registrati</title>
  </head>
  <body>
    <a href="../accedi/">Hai gia un account? accedi</a>
    <?php session_start(); ?>
    <?php include '../_database/connection.php'; ?>
    <?php include 'form.php'; ?>
    <?php include 'post.php'; ?>
  </body>
</html>
