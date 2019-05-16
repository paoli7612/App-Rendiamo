<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "../head.html" ?>
    <title>Lezione</title>
  </head>
  <body>
    <?php include '../nav.php' ?>
    <?php if (!isset($_GET['id']) || !$_GET['id']){header('Location: ../home');} ?>
    <?php $idLezione = $_GET['id'] ?>
    <?php $lezioni = query("SELECT lezioni.*, utentiDiLezioni.idUtente as preferito
                            FROM (
                              SELECT *
                              FROM lezioni
                              WHERE lezioni.id=$idLezione
                            ) AS lezioni
                            LEFT JOIN utentiDiLezioni
                              ON (utentiDiLezioni.idLezione=lezioni.id
                                  AND utentiDiLezioni.idUtente=$idUtente)");
          if (count($lezioni) == 1){
            $lezione = $lezioni[0];
            include 'wrapper.php';
          } else {
            //header('Location: ../lezioneInesistente');
          }

    ?>
  </body>
</html>

