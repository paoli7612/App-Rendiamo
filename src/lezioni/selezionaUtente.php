<?php $utenti = getUtentiCountLezioni(); ?>

<div class="w3-right">
  <div class="w3-panel">
    <button type="button" class="w3-button w3-round-xlarge w3-blue w3-card-4 w3-right <?php if ($u): ?> radius-right w3-quarter <?php endif; ?>" onclick="toggle(2)" id="button_2">
      <i class="fas fa-users"></i>
    </button>
    <div <?php if (!$u): ?> class="w3-hide" <?php endif; ?> id="toggle_2">
      <select class="w3-input w3-round-xlarge radius-left w3-left w3-threequarter" id="utente" onchange="filter_utente()">
        <?php if ($u): ?>
          <option value="<?php $utente = getUtenteId($_GET['utente'])[0]; echo $utente->id ?>"><?php echo $utente->row['cognome']." ".$utente->row['nome']; ?></option>
        <?php else: ?>
          <option></option>
        <?php endif; ?>
        <?php foreach ($utenti as $utente): ?>
          <option value="<?php echo $utente->id ?>"><?php echo $utente->row['cognome']." ".$utente->row['nome'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
</div>
