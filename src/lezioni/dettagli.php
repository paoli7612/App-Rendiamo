<?php $lezione = getLezioneId($_GET['id']) ?>

<?php if (isset($_SESSION['create_lezione'])): ?>
  <?php unset($_SESSION['create_lezione']) ?>
  <div class="w3-panel w3-theme w3-display-container w3-card-4">
    <span onclick="this.parentElement.style.display='none'"
    class="w3-button w3-large w3-display-topright">&times;</span>
    <h2>Fantastico!</h2>
    <p>Lezione creata correttamente. Ora è possibile caricare il materiali.</p>
  </div>
<?php endif; ?>

<div class="w3-panel">
  <h1 class="w3-left"><?php echo $lezione->titolo; ?> -
    <?php echo "Prof " . $lezione->utente->cognome ?> -
    <?php
      $string = "";
      foreach ($lezione->materie as $materia) {
        $string .= $materia->titolo. ", ";
      }
      echo substr($string, 0, -2);
    ?>
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
    <h2>Materiali</h2>
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
      <?php if ($utente->id == $lezione->idUtente): ?>
        <a href="../aggiungiMateriali/?id=<?php echo $_GET['id'] ?>" class="w3-right w3-margin-right">
          <button class="w3-button w3-white w3-card-4" disabled="disabled">
            <i class="fas fa-edit"></i>
          </button>
        </a>
      <?php endif; ?>
      <h2>Note</h2>
      <div class="w3-panel">
        <?php echo $lezione->note ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if ($utente->id == $lezione->idUtente): ?>
<div class="w3-panel w3-half">
  <div class="w3-panel w3-theme-l2 w3-card-4">
    <h2>Opzioni</h2>
    <div class="w3-panel">
      <div class="w3-panel w3-left">

      <button type="button" class="w3-button w3-white w3-card-4" onclick="window.location='../remove/?idLezione=<?php echo $lezione->id ?>'">
        <i class="fas fa-times"></i>
        Elimina Lezione </button>
      </div>
      <div class="w3-panel w3-left">

      <button type="button" class="w3-button w3-white w3-card-4" disabled="disabled">
        <i class="fas fa-users"></i>
        Visualizzazzioni </button>
      </div>
      <div class="w3-panel w3-left">

      <button type="button" class="w3-button w3-white w3-card-4" disabled="disabled">
        <i class="fas fa-trash"></i>
        Rimuovi materiali </button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
