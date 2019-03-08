<!DOCTYPE html>
<html>
  <head>
    <?php include '../_head/link.php'; ?>
    <title>Accedi</title>
  </head>
  <body>
    <?php session_start(); ?>
    <?php print_r($_SESSION); ?>
    <?php include '../_database/connection.php'; ?>
    <?php include 'form.php'; ?>
    <?php include 'post.php'; ?>
  </body>
</html>
