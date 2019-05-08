<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "../head.html" ?>
    <title>Elimina lezione</title>
  </head>
  <body>
    <?php include '../nav.php' ?>

    <?php
      $id = $_GET['id'];
      $lezioni = query("SELECT * FROM lezioni WHERE id=$id");
      if (count($lezioni) == 1){
        if ($lezione['idUtente'] == $_SESSION['user_row']['id']) {
          $lezione = $lezioni[0];
        } else {
          header('Location: ../permessoNegato');
        }
      } else {
        header('Location: ../lezioneInesistente');
      }
    ?>

    <?php include 'wrapper.php' ?>

  </body>
</html>
