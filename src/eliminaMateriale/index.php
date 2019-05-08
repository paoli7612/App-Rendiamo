<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "../head.html" ?>
    <title>Elimina materiale</title>
  </head>
  <body>
    <?php include '../nav.php' ?>


    <?php
      $idMateriale = $_GET['id'];
      $materiali = query("SELECT materiali.*, lezioni.idUtente, lezioni.titolo as l_titolo, lezioni.id as l_id
                          FROM materiali, lezioni
                          WHERE lezioni.id=materiali.idLezione
                            AND materiali.id=$idMateriale");
      if (count($materiali) == 1) {
        $materiale = $materiali[0];
        if ($materiale['idUtente'] != $_SESSION['user_row']['id']){
          header('Location: ../permessoNegato');
        }
      } else {
        header('Location: ../materialeInesistente/');
      }

      ?>

      <?php include 'wrapper.php' ?>

    </body>
    </html>
