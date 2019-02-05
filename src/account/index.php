<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Account </title>
  </head>
  <body>
    <?php include "../header.php"; ?>
    <?php foreach ($utente as $key => $value): ?>
      <?php echo $key. " " . $value. "</br>"; ?>
    <?php endforeach; ?>
  </body>
</html>
