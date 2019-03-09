<?php $materie = getMaterieCountLezioni(); ?>

<h4>Seleziona la materia della lezione che stai cercando</h4>

<?php foreach ($materie as $materia): ?>
  <button onclick="window.location='../lezioni/?materia=<?php echo $materia->id; ?>'">
    <?php echo $materia->row['titolo']; ?>
    <?php echo $materia->row['countLezioni'] ?>
  </button>
<?php endforeach; ?>
