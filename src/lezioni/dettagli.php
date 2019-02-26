<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Home </title>
  </head>
  <body>
    <?php include "../header.php"; ?>

    <?php $lezione = getLezioneId($_GET['id']) ?>

    <?php foreach ($lezione->row as $key => $value): ?>
      <p><?php echo $key . " " . $value ?></p>
    <?php endforeach; ?>
  </body>
</html>
