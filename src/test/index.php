<!DOCTYPE html>
<html>
  <head>
    <?php include '../_head/link.php'; ?>
    <title>Test</title>
  </head>
  <body>
    <?php include '../_database/connection.php' ?>
    <?php include '../_session/start.php' ?>
    <?php include '../_head/bar.php' ?>

    <div class="w3-panel">
      <form method="post">
        <h4>SQL</h4>
        <button type="submit" class="w3-button w3-white w3-right">Avvia</button>
        <input type="text" class="w3-input w3-card-4 w3-half" name="query">
      </form>
    </div>


    <?php  if ($_SERVER['REQUEST_METHOD'] == 'POST')
      include 'post.php';
    ?>

  </body>
</html>
