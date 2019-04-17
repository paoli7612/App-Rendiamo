<div id="wrapper">

  <?php $title="lezione" ?>
  <?php include '../wrapper_head.php' ?>
  <?php $id=$_GET['id'] ?>
  <?php
	$lezioni = query("SELECT lezioni.*, utenti.id as utenteid, utenti.nome, utenti.cognome
    FROM lezioni, utenti
    WHERE utenti.id=lezioni.idUtente
      AND lezioni.id=$id ");
    if($lezioni)$lezione = $lezioni[0];
    else header('Location: ../home/');

  $materiali = query("SELECT tipiMateriali.*, COUNT(materiali.id) FROM tipiMateriali, materiali WHERE materiali.idTipo=tipiMateriali.id GROUP BY tipiMateriali.id");
  include 'post.php';
  $utentidilezioni = query("SELECT preferito from utentiDiLezioni WHERE idUtente=$idUtente AND idLezione=$id ");
  $preferito = count($utentidilezioni);
  ?>

  <div id="content-wrapper">
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../filtra/">Lezioni</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $lezione['titolo'] ?></li>
      </ol>

      <div class="row">
        <?php if ($lezione['idUtente'] == $_SESSION['user_row']['id']): ?>
          <div class="col-xl-12 col-sm-12 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-cogs"></i>
                </div>
                <div class="mr-5">
                  <button type="button" name="button" class="btn btn-light mb-3" onclick="window.location='../aggiungiMateriali/?id=<?php echo $lezione['id'] ?>'">
                    <i class="fas fa-plus"></i>
                    Aggiungi materiali
                  </button>
                  <button type="button" name="button" class="btn btn-light mb-3" onclick="window.location='../modificaLezione/?id=<?php echo $lezione['id']?>'">
                    <i class="fas fa-edit"></i>
                    Modifica lezione
                  </button>
                  <button type="button" name="button" class="btn btn-light mb-3" onclick="window.location='../eliminaLezione/?conferma=0&id=<?php echo $lezione['id']?>'">
                    <i class="fas fa-edit"></i>
                    Elimina lezione
                  </button>
                  <button type="button" name="button" class="btn btn-light mb-3" data-toggle="modal" data-target="#Dettagli">
                    <i class="fas fa-info"></i>
                    Dettagli
                  </button>
                </div>
              </div>
            </div>
          </div>
        <?php elseif ($_SESSION['user_type']=='studente'): ?>
          <div class="col-xl-12 col-sm-12 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-info-circle"></i>
                </div>
                <div class="mr-5">
                  <form method="post">
                    <?php if ($preferito): ?>
                      <button type="submit" name="submit" value="forgot" class="btn btn-light mb-3">
                        <i class="fas fa-bookmark"></i>
                        Salva
                      </button>
                    <?php else: ?>
                      <button type="submit" name="submit" value="save" class="btn btn-light mb-3">
                        <i class="far fa-bookmark"></i>
                        Salva
                      </button>
                    <?php endif; ?>
                    <button type="button" class="btn btn-light mb-3" onclick="window.location='../lezioni/?utente=<?php echo $lezione['utenteid']?>'">
                      <i class="fas fa-user-graduate"></i>
                      <?php echo $lezione['cognome']." ".$lezione['nome'] ?>
                    </button>
                    <button type="button" name="button" class="btn btn-light mb-3" data-toggle="modal" data-target="#Dettagli">
                      <i class="fas fa-info"></i>
                      Dettagli
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php foreach ($materiali as $materiale): ?>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-<?php echo $materiale['colore']?> o-hidden h-100" onmouseover="hover(this, '<?php echo $materiale['colore'] ?>')" onmouseleave="leave(this, '<?php echo $materiale['colore'] ?>')">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-fw <?php echo $materia['icona'] ?>"></i>
              </div>
              <div class="mr-5"><?php echo $materiale['titolo'] ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="../materiali/?lezione=<?php echo $lezione['id'] ?>&materiale=<?php echo $materiale['titolo'] ?>">
              <span class="float-left">Visualizza</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<div class="modal fade" id="Dettagli" tabindex="-1" role="dialog" aria-labelledby="Dettagli" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Dettagli">Dettagli</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if ($lezione['note']): ?>
          <h4>Descrizione</h4>
          <?php echo $lezione['note'] ?>
          <hr class="featurette-divider">
        <?php endif; ?>
        <h4>Materie</h4>
        <?php $materie=query("SELECT * FROM materie, materieDiLezioni WHERE materie.id=materieDiLezioni.idMateria AND materieDiLezioni.idLezione=$id") ?>
        <?php if ($materie): ?>
          <?php foreach ($materie as $materia): ?>
            <?php echo $materia['titolo'] ?> <br>
          <?php endforeach; ?>
        <?php else: ?>
          Nessuna materia selezionata
        <?php endif; ?>
        <?php $etichette=query("SELECT * FROM etichette, etichetteDiLezioni WHERE etichette.id=etichetteDiLezioni.idEtichetta AND etichetteDiLezioni.idLezione=$id") ?>
        <?php if ($etichette): ?>
          <hr class="featurette-divider">
          <h4>Etichette</h4>
          <?php foreach ($etichette as $etichetta): ?>
            <?php echo $etichetta['nome'] ?> <br>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>

<script>
	var hover = function(e, colore){
    if (e.className.indexOf(' bg-secondary') == -1) {
      e.className = e.className.replace('bg-'+colore, 'bg-secondary');
    }
	}

	var leave = function(e, colore){
    e.className = e.className.replace('bg-secondary', 'bg-'+colore);
	}
</script>
