<div class="w3-panel">
  <div class="w3-quarter">
    <div class="w3-panel">
      <img src="../../files/avatar/2.png" class="w3-image w3-grayscale-max w3-card-4">
    </div>
  </div>
  <div class="w3-panel w3-rest w3-blue w3-card-4">
    <div class="w3-panel">
      <h1>
        <?php echo $_UTENTE->row['nome'] . " " . $_UTENTE->row['cognome'] ?>
      </h1>
	  <div class="w3-panel">
		<button class="w3-white" onclick="window.location='../disconnetti/'">Disconnetti</button>
		<button class="w3-white" disabled="disabled">Modifica</button>
	  </div>
    </div>
  </div>
</div>
