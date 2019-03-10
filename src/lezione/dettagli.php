<?php echo $lezione->row['titolo'] ?>
<?php if ($lezione->id == $_UTENTE->id): ?>
  <a href="../modificaLezione/?id=<?php echo $lezione->id ?>">Modifica lezione</a>
<?php endif; ?>

<?php $lezione->loadMateriali(); ?>

<?php foreach ($lezione->materiali as $materiale): ?>
  <div>
    <?php echo $materiale->row['titolo'] ?>
    <?php if ($materiale->row['tipo'] == 'video'): ?>
      <a href="#">Guarda Video</a>
    <?php elseif ($materiale->row['tipo'] == 'pdf'): ?>
      <a href="#">Download pdf</a>
    <?php else: ?>
      <span style="color: grey">formato invalido</span>
    <?php endif; ?>
  </div>
<?php endforeach; ?>


<?php $lezione->loadEtichette(); ?>

<?php foreach ($lezione->etichette as $etichetta): ?>
  <div>
    <a href="../lezioni/?etichetta=<?php echo $etichetta->id ?>">
      <?php echo $etichetta->row['nome'] ?>
    </a>
  </div>
<?php endforeach; ?>
