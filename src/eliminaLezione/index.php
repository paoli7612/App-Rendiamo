<!DOCTYPE html>
<html>
  <head>
    <?php include '../_head/link.php'; ?>
    <title>Elimina lezione</title>
  </head>
  <body>
    <?php include '../_database/connection.php' ?>
    <?php include '../_session/start.php' ?>
    <?php include '../_head/bar.php' ?>

    <?php $lezione = getLezioneId($_GET['id'])[0]; ?>
    <?php if ($_GET['conferma']): ?>
        <?php delLezioneId($lezione->id) ?>
        <?php header('Location: ../lezioni/') ?>
    <?php else: ?>
      <div class="w3-panel">
        <div class="w3-panel w3-card-4 w3-blue">
          <h1>Eliminare La lezione?</h1>
          <div class="w3-panel">
            <button class="w3-green w3-card-4" onclick="window.location='../eliminaLezione/?id=<?php echo $lezione->id ?>&conferma=1'"> Conferma </button>
            <button class="w3-red w3-card-4" onclick="window.location='../modificaLezione/?id=<?php echo $lezione->id ?>'"> Annulla </button>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </body>
</html>
