<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      Docenti
    </li>
  </ol>


  <?php
    if (isset($_GET['salvati'])) {
      $docenti = query("SELECT utenti.*, COUNT(lezioni.id) as count
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
                            AND utenti.preferito
                          GROUP BY utenti.id
                          ORDER BY utenti.cognome, utenti.nome
                        ");
    } else {
      $docenti = query("SELECT utenti.*, COUNT(lezioni.id) as count
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
                        ");
    }
  ?>

  <div class="row">
    <div class="col">
      <div class="card mb-3">
        <div class="card-header">
          Opzioni
          <a class="float-right">
            <i class="fas fa-cogs"></i>
          </a>
        </div>
        <div class="card-body">
          <div class="form-group">
            <div class="form-label-group">
              <label for="inputFiltra">
                <i class="fas fa-search"></i> Filtra</label>
              <input name="password" type="text" id="inputFiltra" class="form-control" placeholder="Filtra" onkeyup="filtraDocenti(this.value)">
              <script>
                var filtraDocenti = function(text){
                  var docenti = document.getElementsByName('docente');
                  for (var i=0; i<docenti.length; i++){
                    var t = docenti[i].getAttribute('search');
                    if (t.toUpperCase().indexOf(text.toUpperCase()) == -1){
                      docenti[i].style['display'] = 'none';
                    } else {
                      docenti[i].style['display'] = '';
                    }
                  }
                }
              </script>
            </div>
          </div>
          <?php if (isset($_GET['salvati'])): ?>
            <button class="btn btn-secondary btn-block" onclick="window.location='../docenti/'">
              <i class="fas fa-users"></i>
              Visualizza tutti i docenti</button>
          <?php else: ?>
            <button class="btn btn-secondary btn-block" onclick="window.location='../docenti/?salvati'">
              <i class="fas fa-bookmark"></i>
              Visualizza solo i docenti salvati</button>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <?php foreach ($docenti as $docente): ?>
    <div class="col-xl-6 col-md-6 col-sm-12" name="docente" search="<?php echo $docente['cognome']." ".$docente['nome'] ?>">
      <div class="card text-white bg-secondary mb-3">
        <div class="card-header">
          <?php echo $docente['cognome']." ".$docente['nome'] ?>
          <a class="float-right">
            <i class="fas fa-user-tie fa-lg"></i>
          </a>
        </div>
        <div class="card-body">
          <?php echo $docente['count']?>
          Lezioni create
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
