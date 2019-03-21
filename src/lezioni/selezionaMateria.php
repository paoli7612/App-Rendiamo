<?php $materie = getMaterieCountLezioni(); ?>

<div class="w3-right">
  <div class="w3-panel">
    <button type="button" class="w3-button w3-round-xlarge w3-blue w3-card-4 w3-right <?php if ($m): ?> radius-right w3-quarter <?php endif; ?>" onclick='toggle(1)' id="button_1">
      <i class="fas fa-book-open"></i>
    </button>
    <div
    <?php if (!$m): ?>
      class="w3-hide"
    <?php endif; ?>
    id="toggle_1">
      <select class="w3-input w3-round-xlarge radius-left w3-left w3-threequarter" id="materia" onchange="filter_materia()">
        <?php if ($m): ?>
          <option value="<?php $materia = getMateriaId($_GET['materia'])[0]; echo $materia->id ?>"><?php echo $materia->row['titolo'] ?></option>
        <?php else: ?>
          <option></option>
        <?php endif; ?>
        <?php foreach ($materie as $materia): ?>
          <option value="<?php echo $materia->id ?>"><?php echo $materia->row['titolo']. "(".$materia->row['countLezioni'].")" ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
</div>
