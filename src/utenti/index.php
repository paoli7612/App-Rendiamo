<!DOCTYPE html>
<html>
  <head>
    <?php include '../_head/link.php'; ?>
    <title>Utenti</title>
  </head>
  <body>
    <?php include '../_database/connection.php' ?>
    <?php include '../_session/start.php' ?>
    <?php include '../_head/bar.php' ?>

    <form method="post">
      <h4>SQL</h4>
      <button type="submit" class="w3-button w3-white w3-right ">Avvia</button>
      <input type="text" class="w3-input w3-card-4" name="query">
    </form>


    <?php  if ($_SERVER['REQUEST_METHOD'] == 'POST')
      include 'post.php';
    ?>

  </body>
</html>
