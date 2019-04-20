<div class="card bg-secondary">
  <h2 class="card-header text-white">
    <?php echo $lezione['titolo'] ?>
  </h2>
  <div class="card-body">
    <?php if ($_SESSION['user_type'] == 'studente'): ?>
      <button class="btn bg-white" onclick="salvaLezione(this, <?php echo $lezione['id'] ?>)">
        <?php if ($lezione['preferito']): ?>
          <i class="fas fa-bookmark"></i>
        <?php else: ?>
          <i class="far fa-bookmark"></i>
        <?php endif; ?>
        Salva</button>
    <?php endif; ?>
    <button class="btn bg-white" onclick="window.location='../lezioni/?docente=<?php echo $docente['id'] ?>'">
      <i class="fas fa-user-graduate"></i>
      <?php echo $docente['nome']." ".$docente['cognome'] ?></button>
    <button class="btn bg-white" onclick="window.location='../dettagli/?id=<?php echo $lezione['id'] ?>'">
      <i class="fas fa-info-circle"></i>
      Dettagli</button>
    <?php if ($_SESSION['user_row']['id'] == $lezione['idUtente']): ?>
      <button class="btn bg-white" onclick="window.location='../modificaLezione/?id=<?php echo $lezione['id'] ?>'">
        <i class="fas fa-edit"></i>
        Modifica</button>
      <button class="btn bg-white" onclick="window.location='../selezionaMaterie/?id=<?php echo $lezione['id'] ?>'">
        <i class="fas fa-book"></i>
        Seleziona materie</button>
    <?php endif; ?>
  </div>
</div>
