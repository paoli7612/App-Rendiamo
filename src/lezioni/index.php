<!DOCTYPE html>
<html>
  <head>
    <?php include '../_head/link.php'; ?>
    <title>Lezioni</title>
  </head>
  <body>
    <?php include '../_database/connection.php' ?>
    <?php include '../_session/start.php' ?>
    <?php include '../_head/bar.php' ?>

    <?php
      if (isset($_GET['materia'])){
        $materia = getMateriaId($_GET['materia'])[0];
        include 'tabella.php';
      } else {
        include 'selezionaMateria.php';
      }
    ?>
  </body>
</html>
