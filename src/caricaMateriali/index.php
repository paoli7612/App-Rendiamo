<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../head.html' ?>
    <title>Carica materiali</title>
  </head>
  <body>
    <?php include '../nav.php' ?>
    <?php
      $id = $_GET['id'];
      $lezioni = query("SELECT * FROM lezioni WHERE id=$id");

      if (count($lezioni) == 1){
        $lezione = $lezioni[0];
      } else {
        header('Location: ../lezioneInesistente');
      }
    ?>


    <?php include 'wrapper.php' ?>
  </body>
</html>
