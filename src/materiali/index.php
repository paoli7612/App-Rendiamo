<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "../head.html" ?>
    <title>Materiali</title>
  </head>
  <body>
    <?php include '../nav.php' ?>

    <?php
      $idTipo = $_GET['tipo'];
      $idLezione = $_GET['id'];
      $lezioni = query("SELECT *
                        FROM lezioni
                        WHERE id=$idLezione");
      if (count($lezioni) == 1) {
        $lezione = $lezioni[0];
      } else {
        header('Location: ../lezioneInesistente');
      }
      $tipi = query("SELECT *
                    FROM tipiMateriali
                    WHERE id=$idTipo");
      if (count($tipi) == 1){
        $tipo = $tipi[0];
      } else {
        header('Location: ../permessoNegato');
      }
      $materiali = query("SELECT *
                          FROM materiali
                          WHERE idTipo=$idTipo
                            AND idLezione=$idLezione") ?>


    <?php include 'wrapper.php' ?>

  </body>
</html>
