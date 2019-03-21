
<?php $lezione->loadEtichette(); ?>

<?php foreach ($lezione->etichette as $etichetta): ?>
  <div>
    <a href="../lezioni/?etichetta=<?php echo $etichetta->id ?>">
      <?php echo $etichetta->row['nome'] ?>
    </a>
  </div>
<?php endforeach; ?>
