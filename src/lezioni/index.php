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


    <a href="../nuovaLezione/">crea nuova lezione</a>
    <?php
      include 'search.php';
      include 'selezionaMateria.php';
      include 'selezionaUtente.php';

      $m = isset($_GET['materia']);
      $u = isset($_GET['utente']);

      if ($m && $u){
        $lezioni = getLezioniIdUtenteIdMateria($_GET['materia'], $_GET['utente']);
      } elseif($m){
        $lezioni = getLezioniIdMateria($_GET['materia']);
      } elseif($u){
        $lezioni = getLezioniIdUtente($_GET['utente']);
      } else {
        $lezioni = getLezioniLimit(100);
      }

      include 'tabella.php';
    ?>
  </body>
</html>
