<div id="wrapper">

  <?php $title="lezioni" ?>
  <?php include '../wrapper_head.php' ?>
  <?php
    $nessunaRicerca = false;
    $lezioni = array();
    if (isset($_GET['utente'])) {
      $lezioni = query("SELECT lezioni.id, lezioni.titolo, utenti.nome, utenti.cognome
                  		  FROM lezioni,utenti
                  		  WHERE idUtente=" . $_GET['utente'].
                          " AND utenti.id=lezioni.idUtente;");
    } elseif (isset($_GET['materia'])) {
	    $lezioni = query("SELECT lezioni.id, lezioni.titolo, utenti.nome, utenti.cognome
                			FROM lezioni, materiedilezioni, utenti
                			WHERE materiedilezioni.idMateria=" . $_GET['materia'] .
                      " AND lezioni.id=materiedilezioni.idLezione
                        AND utenti.id=lezioni.idUtente;");
  	} elseif (isset($_GET['filtra'])){
      if (strlen($_GET['filtra'])>0){
        $lezioni = query("SELECT lezioni.id, lezioni.titolo, utenti.nome, utenti.cognome
          FROM lezioni, utenti
          WHERE lezioni.idUtente=utenti.id
          AND lezioni.titolo LIKE ('%".$_GET['filtra']."%')");
      }
      else{
        unset($_GET['filtra']);
      }
    } else {
      $nessunaRicerca = true;
    }
  ?>

  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../filtra/">Lezioni</a>
        </li>
        <?php if (isset($_GET['utente'])): ?>
          <?php $utente = query("SELECT * FROM utenti WHERE id=".$_GET['utente'])[0] ?>
          <li class="breadcrumb-item">
            <a href="../filtraDocenti/">Ricerca per docente</a>
          </li>
          <li class="breadcrumb-item"><?php echo $utente['nome']." ".$utente['cognome'] ?></li>
        </ol>
        <?php elseif(isset($_GET['materia'])): ?>
          <?php $utente = query("SELECT * FROM materie WHERE id=".$_GET['materia'])[0] ?>
          <li class="breadcrumb-item">
            <a href="../filtraMaterie/">Ricerca per materie</a>
          </li>
          <li class="breadcrumb-item"><?php echo $utente['titolo']?></li>
        </ol>
        <?php else: ?>
          <li class="breadcrumb-item">Ricerca testuale</li>
        </ol>
        <form method="get">
            <div class="row float-center">
            <div class="col-xl-4 sm-0">
            </div>
            <div class="col-xl-3 col-sm-8">
              <div class="form-group">
                <div class="form-label-group">
                  <input name="filtra" type="text" id="inputFiltra" class="form-control" placeholder="Cerca" required="required" <?php if (isset($_GET['filtra'])){ echo "value=".$_GET['filtra'];} ?>>
                  <label for="inputFiltra">Cerca</label>
                </div>
              </div>
            </div>
            <div class="col-xl-1 col-sm-4">
              <button type="submit" class="btn btn-block bg-primary text-white" style="height: 50px" onclick="filtra()">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      <?php endif; ?>
      <div class="row">
        <?php if ($lezioni): ?>
          <?php foreach ($lezioni as $lezione): ?>
            <div class="col-xl-4 col-sm-4 mb-3" onclick="window.location='../lezione/?id=<?php echo $lezione['id'] ?>'">
              <div class="card text-white bg-secondary o-hidden h-100" onmouseover="hover(this)" onmouseleave="leave(this)">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-bars"></i>
                  </div>
                  <div class="mr-5"><?php echo $lezione['titolo'] ?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="../lezione/?id=<?php echo $lezione['id'] ?>">
                  <span class="float-left"><?php echo $lezione['nome']." ".$lezione['cognome'] ?></span>
                  <span class="float-right">
                    <i class="fas fa-user"></i>
                  </span>
                </a>
                <?php $materie = query("SELECT * FROM materie, materiedilezioni WHERE materiedilezioni.idLezione=".$lezione['id']." AND materie.id=materiedilezioni.idMateria") ?>
                <a class="card-footer text-white clearfix small z-1" href="../lezione/?id=<?php echo $lezione['id'] ?>">
                  <span class="float-left">
                    <?php if ($materie): ?>
                      <?php foreach ($materie as $materia): ?>
                        <?php echo $materia['titolo'] ?>
                      <?php endforeach; ?>
                      <?php else: ?>
                        Nessuna materia
                    <?php endif; ?>
                  </span>
                  <span class="float-right">
                    <i class="fas fa-book"></i>
                  </span>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col">
            <?php if ($nessunaRicerca): ?>

            <?php else: ?>
              <h2>Nessun risultato trovato</h2>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</div>
