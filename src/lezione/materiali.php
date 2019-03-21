
<?php $lezione->loadMateriali(); ?>

<?php foreach ($lezione->materiali as $materiale): ?>
  <div>
    <?php echo $materiale->row['titolo'] ?>
    <?php if ($materiale->row['tipo'] == 'video'): ?>
      <a href="#">Guarda Video</a>
    <?php elseif ($materiale->row['tipo'] == 'pdf'): ?>
      <a href="#">Download pdf</a>
    <?php else: ?>
      <span style="color: grey">formato invalido</span>
    <?php endif; ?>
  </div>
<?php endforeach; ?>
