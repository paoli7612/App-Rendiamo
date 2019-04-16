<?php if ($_SESSION['user_row']['aiuti']): ?>
  <div class="card mb-3">
    <div class="card-header">
      Aiuto
      <a class="float-right">
        <i class="fas fa-question-circle"></i>
      </a>
    </div>
    <div class="card-body">
      Ecco la lista dei docenti. I docenti grigi non hanno ancora pubblicato nessuna lezione.
      Attenzione che quando usi un filtro, quello precedente viene alterato se non annullato.
    </div>
  </div>
<?php endif; ?>
