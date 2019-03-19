<?php $utenti = getUtentiCountLezioni(); ?>

<h4>Seleziona il docente che ha creato la lezione che stai cercando</h4>

<?php foreach ($utenti as $utente): ?>

  <button onclick="window.location='../lezioni/?utente=<?php echo $utente->id; ?><?php if (isset($_GET['materia'])){ echo '&materia='.$_GET['materia'];} ?>'"
    <?php if (isset($_GET['utente']) && $_GET['utente'] == $utente->id): ?>
      class="btn btn-primary"
    <?php else: ?>
      class="btn btn-secondary"
    <?php endif; ?>>
    <?php echo $utente->row['nome']; ?>
    <?php echo $utente->row['countLezioni'] ?>
  </button>
<?php endforeach; ?>
<?php print_r($_GET); ?>
