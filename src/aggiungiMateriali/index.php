<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include '../head.html' ?>
    <title>Aggiungi materiali</title>
  </head>
  <body>
    <?php include '../nav.php' ?>
    <?php include 'wrapper.php' ?>
	<?php $id = $_GET['id'] ?>
	<?php $lezione = query("SELECT * FROM lezioni WHERE id='$id'")[0];?>
	<?php lezione_docente($lezione)?>

  </body>
</html>
