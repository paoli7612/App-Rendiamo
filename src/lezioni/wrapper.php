<div id="wrapper">

  <?php $title="lezioni" ?>
  <?php include '../wrapper_head.php' ?>
  <?php
    if (isset($_GET['utente'])) {
      $lezioni = query("SELECT lezioni.id, lezioni.titolo, utenti.nome, utenti.cognome
                  		  FROM lezioni,utenti
                  		  WHERE idUtente=" . $_GET['utente'].
                          " AND utenti.id=lezioni.idUtente;");
    } elseif (isset($_GET['materia'])) {
		$lezioni = query("SELECT lezioni.id, lezioni.titolo
                			FROM lezioni, materiedilezioni
                			WHERE materiedilezioni.idMateria=" . $_GET['materia'] .
                      " AND lezioni.id=materiedilezioni.idLezione;");
  	} elseif (isset($_GET['filtra'])){
      $lezioni = query("SELECT lezioni.id, lezioni.titolo, utenti.nome, utenti.cognome
                      FROM lezioni, utenti
                      WHERE lezioni.idUtente=utenti.id
                        AND lezioni.titolo LIKE ('%".$_GET['filtra']."%')");
    } else {
      $lezioni = query("SELECT lezioni.id, lezioni.titolo, utenti.nome, utenti.cognome
	                    FROM lezioni, utenti
                      WHERE lezioni.idUtente=utenti.id");
    }
  ?>

  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../lezioni/">Lezioni</a>
        </li>
      </ol>
      <?php if (!(isset($_GET['utente']) || isset($_GET['materia']))): ?>
        <form method="get">
            <div class="row float-center">
            <div class="col-xl-4 sm-0">
            </div>
            <div class="col-xl-3 col-sm-8">
              <div class="form-group">
                <div class="form-label-group">
                  <input name="filtra" type="text" id="inputFiltra" class="form-control" placeholder="Filtra" required="required" <?php if (isset($_GET['filtra'])){ echo "value=".$_GET['filtra'];} ?>>
                  <label for="inputFiltra">Filtra</label>
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
                    <i class="fas fa-fw fa-file-pdf"></i>
                  </div>
                  <div class="mr-5"><?php echo $lezione['titolo'] ?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="../documenti/?id=<?php echo $lezione['id'] ?>">
                  <span class="float-left"><?php echo $lezione['nome']." ".$lezione['cognome'] ?></span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col">
            <h2>Nessun risultato trovato</h2>
          </div>
        <?php endif; ?>
      </div>
      <script>
        var hover = function(e){
          e.className = "card text-white bg-primary o-hidden h-100";
        }
        var leave = function(e){
          e.className = "card text-white bg-secondary o-hidden h-100";
        }
      </script>
    </div>
  </div>
</div>
