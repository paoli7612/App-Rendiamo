<?php if ($lezione->isPreferito($_UTENTE->id)): ?>
  <h2 class="w3-right">
    &nbsp;&nbsp;
    <a href="../modificaLezione/?id=<?php echo $lezione->id ?>">
      <button class="w3-tooltip">
        <span class="w3-text w3-animate-right">Rimuovi dai preferiti</span>
        <i class="fas fa-heart"></i>
      </button>
    </a>
  </h2>
<?php else: ?>
  <h2 class="w3-right">
    &nbsp;&nbsp;
    <a href="../modificaLezione/?id=<?php echo $lezione->id ?>">
      <button class="w3-tooltip">
        <span class="w3-text w3-animate-right">Aggiungi ai preferiti</span>
        <i class="fas fa-plus"></i>
      </button>
    </a>
  </h2>
<?php endif; ?>
