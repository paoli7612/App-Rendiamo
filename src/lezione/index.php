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

    <?php
    if (isset($_GET['id'])) {
      $lezione = getLezioneId($_GET['id'])[0];
      include 'dettagli.php';
    } else {
      header('Location: ../lezioni/');
    }

    ?>

  </body>
</html>
