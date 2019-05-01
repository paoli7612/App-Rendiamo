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
      $lezioni = query("SELECT lezioni.*, utentiDiLezioni.idUtente AS preferito
                        FROM (
                          SELECT lezioni.*, utenti.nome, utenti.cognome
                          FROM (
                            SELECT lezioni.*, COUNT(materiali.id) as countMateriali
                            FROM lezioni
                            LEFT JOIN materiali
                              ON materiali.idLezione=lezioni.id
                            GROUP BY lezioni.id
                          ) AS lezioni, utenti, materieDiLezioni
                          WHERE lezioni.idUtente=utenti.id
                            AND materieDiLezioni.idLezione=lezioni.id
                            AND materieDiLezioni.idMateria=$idMateria
                          ) AS lezioni
                        LEFT JOIN utentiDiLezioni
                        ON utentiDiLezioni.idLezione=lezioni.id
                          AND utentiDiLezioni.idUtente=3
                        ORDER BY lezioni.titolo");
    } elseif (isset($_GET['docente'])) {
        $idDocente = $_GET['docente'];
        $lezioni = query("SELECT lezioni.*, utentiDiLezioni.idUtente AS preferito
                          FROM (
                            SELECT lezioni.*, utenti.nome, utenti.cognome
                            FROM (
                              SELECT lezioni.*, COUNT(materiali.id) as countMateriali
                              FROM lezioni
                              LEFT JOIN materiali
                                ON materiali.idLezione=lezioni.id
                              GROUP BY lezioni.id
                            ) AS lezioni, utenti
                            WHERE lezioni.idUtente=utenti.id
                              AND utenti.id=$idDocente
                            ) AS lezioni
                          LEFT JOIN utentiDiLezioni
                          ON utentiDiLezioni.idLezione=lezioni.id
                            AND utentiDiLezioni.idUtente=3
                          ORDER BY lezioni.titolo");
    } elseif (isset($_GET['salvate'])){
        $idUtente = $_SESSION['user_row']['id'];
        $lezioni = query("SELECT lezioni.*, utenti.nome, utenti.cognome, utentiDiLezioni.idUtente AS preferito
                          FROM (
                            SELECT lezioni.*, COUNT(materiali.id) as countMateriali
                            FROM lezioni
                            LEFT JOIN materiali
                              ON materiali.idLezione=lezioni.id
                            GROUP BY lezioni.id
                          ) AS lezioni, utenti, utentiDiLezioni
                          WHERE lezioni.idUtente=utenti.id
                            AND utentiDiLezioni.idUtente=$idUtente
                            AND utentiDiLezioni.idLezione=lezioni.id
                            ORDER BY lezioni.titolo");
    } elseif (isset($_GET['ricerca'])){
        $ricerca = $_GET['ricerca'];
        $lezioni = query("SELECT lezioni.*, utentiDiLezioni.idUtente AS preferito
                          FROM (
                            SELECT lezioni.*, utenti.nome, utenti.cognome
                            FROM (
                              SELECT lezioni.*, COUNT(materiali.id) as countMateriali
                              FROM lezioni
                              LEFT JOIN materiali
                                ON materiali.idLezione=lezioni.id
                              GROUP BY lezioni.id
                            ) AS lezioni, utenti
                            WHERE lezioni.idUtente=utenti.id
                              AND lezioni.titolo LIKE '%$ricerca%'
                            ) AS lezioni
                          LEFT JOIN utentiDiLezioni
                          ON utentiDiLezioni.idLezione=lezioni.id
                            AND utentiDiLezioni.idUtente=3
                          ORDER BY lezioni.titolo");
    }
  ?>

  <div class="row">
    <div class="col-12 mb-3 text-white">
      <?php if (isset($_GET['materia'])): ?>
        <?php $materia = query("SELECT * FROM materie WHERE id=".$_GET['materia'])[0] ?>
        <div class="card bg-primary card-body">
          <div class="row">
            <div class="col">
              <h3>Ricerca per materia</h3>
              <h5><?php echo $materia['titolo'] ?></h5>
            </div>
            <div class="col">
              <h1 class="float-right">
                <i class="fas fa-swatchbook"></i>
              </h1>
            </div>
          </div>
        </div>
      <?php elseif (isset($_GET['ricerca'])): ?>
        <div class="card bg-primary card-body">
          <div class="row">
            <div class="col">
              <h3>Ricerca testuale</h3>
              <h5><?php echo $ricerca ?></h5>
            </div>
            <div class="col">
              <h1 class="float-right">
                <i class="fas fa-search"></i>
              </h1>
            </div>
          </div>
        </div>
      <?php elseif (isset($_GET['docente'])): ?>
        <?php $docente = query("SELECT * FROM utenti WHERE id=".$_GET['docente'])[0] ?>
        <div class="card bg-danger card-body">
          <div class="row">
            <div class="col">
              <h3>Ricerca per docente</h3>
              <h5><?php echo $docente['nome']." ".$docente['cognome'] ?></h5>
            </div>
            <div class="col">
              <h1 class="float-right">
                <i class="fas fa-user-tie"></i>
              </h1>
            </div>
          </div>
        </div>
      <?php elseif (isset($_GET['salvate'])): ?>
        <div class="card bg-warning card-body">
          <div class="row">
            <div class="col">
              <h3>Lezioni salvate</h3>
            </div>
            <div class="col">
              <h1 class="float-right">
                <i class="fas fa-bookmark"></i>
              </h1>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <?php if ($lezioni): ?>
      <?php foreach ($lezioni as $lezione): ?>
        <div class="col-xl-6 col-md-6 col-sm-12">
          <div class="card text-white bg-secondary mb-3">
            <div class="card-body">
              <?php echo $lezione['titolo'] ?>
            </div>
            <div class="card-footer">
              <div class="float-right">
                <i class="fas fa-swatchbook"></i>
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
                <i class="fas fa-user-tie"></i>
              </div>
              <?php echo $lezione['cognome'] ?>
              <?php echo $lezione['nome'] ?>
            </div>
            <div class="card-footer">
              <div class="float-right">
                <i class="fas fa-layer-group"></i>
              </div>
            <?php echo $lezione['countMateriali'] ?>
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
    <?php else: ?>
      <div class="container">

      <div class="card bg-light card-body">
        <div class="row">
          <div class="col">
            <h3>Nessun risultato trovato</h3>
            <p>Nessuna lezione corrisponde ai parametri di ricerca</p>
          </div>
          <div class="col">
            <h1 class="float-right">
              <i class="fas fa-exclamation-triangle"></i>
            </h1>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>
