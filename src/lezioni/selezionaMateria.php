<?php $materie = getMaterieCountLezioni(); ?>

<h4>Seleziona la materia della lezione che stai cercando</h4>

<?php foreach ($materie as $materia): ?>
  <button onclick="window.location='../lezioni/?materia=<?php echo $materia->id; ?><?php if (isset($_GET['utente'])){ echo '&utente='.$_GET['utente'];} ?>'"
    <?php if (isset($_GET['materia']) && $_GET['materia'] == $materia->id): ?>
      class="btn btn-primary"
    <?php else: ?>
      class="btn btn-secondary"
    <?php endif; ?>>
    <?php echo $materia->row['titolo']; ?>
    <?php echo $materia->row['countLezioni'] ?>
  </button>
<?php endforeach; ?>
<button onclick="window.location='../lezioni/'">TUTTO</button>
