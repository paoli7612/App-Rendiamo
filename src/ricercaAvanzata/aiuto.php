<?php if ($_SESSION['user_row']['aiuti']): ?>
  <div class="col-xl-4 col-sm-12 mb-3">
    <div class="card">
      <div class="card-header">
        Aiuto
        <a href="#" class="float-right">
          <i class="fas fa-question-circle"></i>
        </a>
      </div>
      <div class="card-body">
        La <b>Ricerca Avanzata</b> permette di applicare più filtri alla ricerca di una lezione.
        Inoltre il testo inserito viene paragonato sia al titolo delle lezioni,
        sia alle etichette che i tuoi professori hanno inserito. (Per esempio se cerchi <b>Tangente</b>
        ed esiste una lezione <b>Trigonometria</b> è probabile che esca nei risultati per via delle etichette)
      </div>
    </div>
  </div>
<?php endif; ?>
