<?php $lezione = getLezioneId($_GET['id']) ?>
<div class="w3-panel">
  <?php foreach ($lezione->row as $key => $value): ?>
    <p><?php echo $key . " " . $value ?></p>
  <?php endforeach; ?>
</div>
