<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      <input type="text" name="query" autofocus="autofocus" style="width: 90%"
      <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        value="<?php echo $_POST['query'] ?>"
      <?php endif; ?>
      >
      <input type="submit" value="RUN" style="width: 8%">
    </form>

    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        include '../connection.php';
        $r = query($_POST['query']);
          foreach ($r as $row) {
            print_r($row);
            echo "<br>";
        }

      }
    ?>
  </body>
</html>
