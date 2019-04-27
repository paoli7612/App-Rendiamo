<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      Docenti
    </li>
  </ol>

  <?php $docenti = query("SELECT utenti.*, COUNT(lezioni.id) as count
                          FROM (
                            SELECT utenti.*, utentidiutenti.idUtente as preferito
                            FROM utenti
                            LEFT JOIN utentidiutenti
                              ON (
                                utentidiutenti.idUtente=utenti.id AND
                                utentidiutenti.idStudente=$idUtente
                              )
                            ) as utenti
                          LEFT JOIN lezioni
                            ON (
                              lezioni.idUtente=utenti.id
                            )
                            WHERE NOT utenti.tipo = 'studente'
                            GROUP BY utenti.id
                            ORDER BY utenti.cognome, utenti.nome
                          ") ?>
  <div class="row">
    <?php foreach ($docenti as $docente): ?>
    <div class="col-xl-6 col-md-6 col-sm-12">
      <div class="card text-white bg-secondary mb-3">
        <div class="card-body">
          <?php echo $docente['cognome']." ".$docente['nome'] ?>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col">
              <button class="btn bg-white btn-block" onclick="window.location='../lezioni/?docente=<?php echo $docente['id'] ?>'">
                Lezioni</button>
            </div>
            <?php if ($_SESSION['user_type'] == 'studente'): ?>
              <div class="col">
                <button class="btn bg-white btn-block" onclick="salvaDocente(this,<?php echo $docente['id'] ?>)">
                  <?php if ($docente['preferito']): ?>
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
