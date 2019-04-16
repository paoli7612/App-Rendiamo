<?php if ($_SESSION['user_row']['aiuti']): ?>
  <div class="col-xl-3 col-sm-12 mb-3">
    <div class="card">
      <div class="card-header">
        Aiuto
        <a class="float-right">
          <i class="fas fa-question-circle"></i>
        </a>
      </div>
      <div class="card-body">
        Qui hai la possibilià di selezionare il metodo di ricerca della lezione. (Ricorda che spesso è più facile tentare)
        <ul>
          <li><b>Ricerca per materia</b>: visualizza tutte le lezioni di una certa materia</li>
          <li><b>Ricerca per docente</b>: scelto un docente, visualizza tutte le lezioni che esso ha creato</li>
          <li><b>Ricerca testuale</b>: ricerca una lezione tramite il titolo</li>
          <li><b>Ricerca avanzata</b>: decidi i parametri di una ricerca mirata ad una o più lezioni</li>
          <li><b>Lezioni salvate</b>: mostra solo le lezioni gia salvate</li>
        </ul>
      </div>
    </div>
  </div>
<?php endif; ?>
