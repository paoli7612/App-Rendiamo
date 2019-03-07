<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = delLezioneId($lezione->id);
    if ($errors){
      print_r($errors);
    } else {
      $_SESSION['delete_lezione'] = true;
      header('Location: ../lezioni');
    }
  }

?>



<form method="post">
  <div class="w3-panel w3-display-container">
    <div class="w3-panel w3-half w3-theme-l2 w3-card-4 w3-display-topmiddle">
      <div class="w3-panel">
        <h1>Attenzione!</h1>
        <h4>Cancellare davvero la lezione: <b><?php echo $lezione->titolo ?></b>?</h4>
      </div>
      <div class="w3-panel w3-center">
        <button type="submit" class="w3-button w3-white w3-card-4">Conferma</button>
        <button type="button" class="w3-button w3-white w3-card-4" onclick="window.location='../lezioni/?id=<?php echo $lezione->id ?>'">Annulla</button>
      </div>
    </div>
  </div>
</form>
