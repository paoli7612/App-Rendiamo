<!DOCTYPE html>
<html>
  <head>
    <?php include '../_head/link.php'; ?>
    <title></title>
  </head>
  <body>
    <?php include '../_database/connection.php' ?>
    <?php include '../_session/start.php' ?>
    <?php include '../_head/bar.php' ?>

    <?php $lezione = getLezioneId($_GET['id'])[0]; ?>
    <?php include 'options.php' ?>

  </body>
</html>
