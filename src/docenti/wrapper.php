<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      Docenti
      <?php if (isset($_GET['salvati'])): ?>
        salvati
      <?php elseif (isset($_GET['attivi'])): ?>
        attivi
      <?php endif; ?>
    </li>
  </ol>


  <?php
    if (isset($_GET['salvati'])) {
      $docenti = query("SELECT utenti.*, COUNT(lezioni.id) as count
                        FROM (
                          SELECT utenti.*, utentiDiUtenti.idUtente as preferito
                          FROM utenti
                          LEFT JOIN utentiDiUtenti
                            ON (
                              utentiDiUtenti.idUtente=utenti.id AND
                              utentiDiUtenti.idStudente=$idUtente
                            )
                          ) as utenti
                        LEFT JOIN lezioni
                          ON (
                            lezioni.idUtente=utenti.id
                          )
                          WHERE utenti.tipo = 'professore'
                            AND utenti.preferito
                          GROUP BY utenti.id
                          ORDER BY utenti.cognome, utenti.nome
                        ");
    } elseif (isset($_GET['attivi'])) {
      $docenti = query("SELECT utenti.*, COUNT(lezioni.id) as count
                        FROM (
                          SELECT utenti.*, utentiDiUtenti.idUtente as preferito
                          FROM utenti
                          LEFT JOIN utentiDiUtenti
                            ON (
                              utentiDiUtenti.idUtente=utenti.id AND
                              utentiDiUtenti.idStudente=$idUtente
                            )
                          ) as utenti
                        LEFT JOIN lezioni
                          ON (
                            lezioni.idUtente=utenti.id
                          )
                          WHERE utenti.tipo = 'professore'
                          GROUP BY utenti.id
                          HAVING count>0
                          ORDER BY utenti.cognome, utenti.nome
                        ");
    } else {
      $docenti = query("SELECT utenti.*, COUNT(lezioni.id) as count
                        FROM (
                          SELECT utenti.*, utentiDiUtenti.idUtente as preferito
                          FROM utenti
                          LEFT JOIN utentiDiUtenti
                            ON (
                              utentiDiUtenti.idUtente=utenti.id AND
                              utentiDiUtenti.idStudente=$idUtente
                            )
                          ) as utenti
                        LEFT JOIN lezioni
                          ON (
                            lezioni.idUtente=utenti.id
                          )
                          WHERE utenti.tipo = 'professore'
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
          <div class="row">
            <div class="col">
              <button class="btn btn-<?php if (isset($_GET['attivi']) || isset($_GET['salvati'])) echo 'secondary'; else echo 'primary' ?> btn-block" onclick="window.location='../docenti/'">
                <i class="fas fa-users"></i>
                Tutti
              </button>
            </div>
            <?php if ($_SESSION['user_type'] == 'studente'): ?>
              <div class="col">
                <button class="btn btn-<?php if(isset($_GET['salvati'])) echo 'primary'; else echo 'secondary' ?> btn-block" onclick="window.location='../docenti/?salvati'">
                  <i class="fas fa-bookmark"></i>
                  Salvati
                </button>
              </div>
            <?php endif; ?>
            <div class="col">
              <button class="btn btn-<?php if(isset($_GET['attivi'])) echo 'primary'; else echo 'secondary' ?> btn-block" onclick="window.location='../docenti/?attivi'">
                <i class="fas fa-book"></i>
                Attivi
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <?php if ($_SESSION['user_type'] == 'studente' && $_SESSION['user_row']['aiuti']): ?>
      <div class="col-12 mb-3">
        <div class="card">
          <div class="card-header">
            Aiuto
            <a class="float-right">
              <i class="fas fa-question-circle"></i>
            </a>
          </div>
          <div class="card-body">
            In questa pagina puoi visualizzare tutti i docenti registrati. Puoi filtrare la ricerca tramite i pulsanti nella finestra <b>Opzioni</b>.
            <ul>
              <li> I docenti <b>Attivi</b> sono i professori che hanno pubblicato almeno una lezione. </li>
              <li> I docenti <b>Salvati</b> sono quelli che hai gia salvato tra i preferiti. </li>
            </ul>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($docenti): ?>
      <?php foreach ($docenti as $docente): ?>
        <div class="col-xl-4 col-md-6 col-sm-12" name="docente" search="<?php echo $docente['cognome']." ".$docente['nome'] ?>">
          <div class="card text-white bg-secondary mb-3">
            <div class="card-header">
              <?php echo $docente['cognome']." ".$docente['nome'] ?>
              <a class="float-right">
                <i class="fas fa-user-graduate fa-lg"></i>
              </a>
            </div>
            <div class="card-body">
              <?php echo $docente['count']?>
              Lezioni create
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col">
                  <button class="btn bg-white btn-block" onclick="window.location='../lezioni/?docente=<?php echo $docente['id'] ?>'" <?php if ($docente['count'] == 0): ?>disabled="disabled"<?php endif; ?>>
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
    <?php else: ?>
      <div class="container">
        <div class="card bg-light card-body">
          <div class="row">
            <div class="col">
              <h3>Nessun docente trovato</h3>
              <p>Nessuna docente corrisponde ai parametri di ricerca</p>
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
