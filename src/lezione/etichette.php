
<?php $lezione->loadEtichette(); ?>


<?php if ($lezione->etichette): ?>
  <div class="w3-panel w3-half">
    <div class="w3-panel w3-card-4 w3-blue">
      <h1>Etichette</h1>
      <div class="w3-panel">
        <?php foreach ($lezione->etichette as $etichetta): ?>
          <div>
            <a href="../lezioni/?ricerca=<?php echo $etichetta->row['nome'] ?>">
              <?php echo $etichetta->row['nome'] ?>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
