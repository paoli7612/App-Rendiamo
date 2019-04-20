<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      Lezioni
    </li>
  </ol>


  <?php
    if (isset($_GET['materia'])) {
      $idMateria = $_GET['materia'];
      $lezioni = query("SELECT lezioni.*, utentidilezioni.idUtente as preferito
                        FROM (
                          SELECT lezioni.*, utenti.nome, utenti.cognome
                          FROM lezioni, utenti, materieDiLezioni
                          WHERE lezioni.idUtente=utenti.id
                            AND materieDiLezioni.idLezione=lezioni.id
                            AND materieDiLezioni.idMateria=$idMateria
                          ) as lezioni
                        LEFT JOIN utentidilezioni
                        ON utentidilezioni.idLezione=lezioni.id
                          AND utentidilezioni.idUtente=3
                        ORDER BY lezioni.titolo");
    } elseif (isset($_GET['docente'])) {
      $idDocente = $_GET['docente'];
      $lezioni = query("SELECT lezioni.*, utentidilezioni.idUtente as preferito
                        FROM (
                          SELECT lezioni.*, utenti.nome, utenti.cognome
                          FROM lezioni, utenti
                          WHERE lezioni.idUtente=utenti.id
                            AND utenti.id=$idDocente
                          ) as lezioni
                        LEFT JOIN utentidilezioni
                        ON utentidilezioni.idLezione=lezioni.id
                          AND utentidilezioni.idUtente=3
                        ORDER BY lezioni.titolo");
    } elseif (isset($_GET['salvate'])){
      $idUtente = $_SESSION['user_row']['id'];
      $lezioni = query("SELECT lezioni.*, utenti.nome, utenti.cognome, utentiDiLezioni.idUtente as preferito
                        FROM lezioni, utenti, utentidilezioni
                        WHERE lezioni.idUtente=utenti.id
                          AND utentidilezioni.idUtente=$idUtente
                          AND utentidilezioni.idLezione=lezioni.id
                          ORDER BY lezioni.titolo");
    }
  ?>


  <div class="row">
    <?php foreach ($lezioni as $lezione): ?>
    <div class="col-xl-6 col-md-6 col-sm-12">
      <div class="card text-white bg-secondary mb-3">
        <div class="card-body">
          <?php echo $lezione['titolo'] ?>
        </div>
        <div class="card-footer">
          <div class="float-right">
            <i class="fas fa-book"></i>
          </div>
          <?php $materie = query("SELECT materie.* FROM materie, materieDiLezioni WHERE materie.id=materieDiLezioni.idMateria AND materieDiLezioni.idLezione=".$lezione['id']) ?>
          <?php if ($materie): ?>
            <?php foreach ($materie as $materia): ?>
              <?php echo $materia['titolo'] ?>
            <?php endforeach; ?>
          <?php else: ?>
            Nessuna materia
          <?php endif; ?>
        </div>
        <div class="card-footer">
          <div class="float-right">
            <i class="fas fa-user"></i>
          </div>
          <?php echo $lezione['cognome'] ?>
          <?php echo $lezione['nome'] ?>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col">
              <button class="btn bg-white btn-block" onclick="window.location='../lezione/?id=<?php echo $lezione['id'] ?>'">
                Visualizza</button>
            </div>
            <?php if ($_SESSION['user_type'] == 'studente'): ?>
              <div class="col">
                <button class="btn bg-white btn-block" onclick="salvaLezione(this,<?php echo $lezione['id'] ?>)">
                  <?php if ($lezione['preferito']): ?>
                    <i class="fas fa-bookmark"></i>
                  <?php else: ?>
                    <i class="far fa-bookmark"></i>
                  <?php endif; ?>
                  Salva</button>
                </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
