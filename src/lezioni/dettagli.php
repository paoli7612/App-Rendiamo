<?php $lezione = getLezioneId($_GET['id']) ?>

<div class="w3-panel">
  <h1 class="w3-left"><?php echo $lezione->titolo; ?> -
    <?php echo "Prof " . $lezione->utente->cognome ?>
  </h1>
</div>

<div class="w3-panel w3-half">
  <div class="w3-panel w3-theme-l2 w3-card-4">
    <?php $materiali = getMaterialiIdLezione($lezione->id); ?>
    <?php if ($utente->id == $lezione->idUtente): ?>
      <a href="../aggiungiMateriali/?id=<?php echo $_GET['id'] ?>" class="w3-right">
        <button class="w3-button w3-white w3-card-4">
          <i class="fas fa-plus"></i>
        </button>
      </a>
      <a href="../aggiungiMateriali/?id=<?php echo $_GET['id'] ?>" class="w3-right w3-margin-right">
        <button class="w3-button w3-white w3-card-4" disabled="disabled">
          <i class="fas fa-trash"></i>
        </button>
      </a>
    <?php endif; ?>
    <h3>Materiali</h3>
    <?php if ($materiali): ?>
      <?php foreach ($materiali as $materiale): ?>
      <div class="w3-panel">
        <a href="/App-Rendiamo/files/<?php echo $materiale->indirizzo ?>" download="download">
          <button class="w3-button w3-white w3-card-4">
            <i class="fas fa-file"></i>
            <?php echo $materiale->titolo ?>
          </button>
        </a>
      </div>
    <?php endforeach; ?>
    <?php else: ?>
      <div class="w3-panel">
        Nessun materiale attualmente caricato per questa lezione
      </div>
    <?php endif; ?>
  </div>
</div>
<?php if ($lezione->note): ?>
  <div class="w3-panel w3-half">
    <div class="w3-theme-l2 w3-panel w3-card-4">
      <a href="../aggiungiMateriali/?id=<?php echo $_GET['id'] ?>" class="w3-right w3-margin-right">
        <button class="w3-button w3-white w3-card-4" disabled="disabled">
          <i class="fas fa-edit"></i>
        </button>
      </a>
      <h3>Note</h3>
      <div class="w3-panel">
        <?php echo $lezione->note ?>
      </div>
    </div>
  </div>
<?php endif; ?>
