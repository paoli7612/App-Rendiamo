<?php echo $lezione->row['titolo'] ?>
<?php if ($lezione->id == $_UTENTE->id): ?>
  <a href="../modificaLezione/">Modifica lezione</a>
<?php endif; ?>
