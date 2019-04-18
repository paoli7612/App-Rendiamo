<div id="wrapper">

  <?php $title="docenti" ?>
  <?php include '../wrapper_head.php' ?>
  <?php $idUtente = $_SESSION['user_row']['id'] ?>
  <?php $docenti = query("SELECT utenti.*, COUNT(lezioni.id) as count
                          FROM (
                            SELECT utenti.*, utentiDiUtenti.preferito
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
                            WHERE NOT utenti.tipo = 'studente'
                            GROUP BY utenti.id
                            ORDER BY utenti.cognome, utenti.nome
                          ") ?>

  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Docenti</li>
      </ol>
      <div class="row">
        <div class="col-xl-4 col-sm-12 mb-3">
          <?php if ($_SESSION['user_type'] == 'studente'): ?>
            <?php include 'aiuto.php' ?>
          <?php endif; ?>
          <div class="card">
            <div class="card-header">
              Opzioni
              <a>
                <i class="fas fa-cogs float-right"></i>
              </a>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="inputFiltra" class="form-control" placeholder="Filtra" autofocus="autofocus" onkeyup="filtra()">
                  <label for="inputFiltra">Filtra</label>
                  <script type="text/javascript">
                    var filtra = function(){
                      var text = document.getElementById('inputFiltra').value;
                      var docenti = document.getElementsByName('docente');
                      for (var i=0; i<docenti.length; i++){
                        d = docenti[i];
                        var t = d.getElementsByTagName("h2")[0].innerHTML;
                        if (t.toUpperCase().indexOf(text.toUpperCase()) == -1){
                          d.style['display'] = 'none';
                        } else {
                          d.style['display'] = '';
                        }
                      }
                    }
                  </script>
                </div>
              </div>
                <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="filtraInattivi" onchange="filtraInattivi(this.checked)">
                <label class="custom-control-label" for="filtraInattivi" >Nascondi docenti che non hanno pubblicato lezioni (grigi)</label>
                <script type="text/javascript">
                var filtraInattivi = function(c){
                  if (c){
                    $("[attivo='no']").hide();
                  }else{
                    $("[attivo='no']").show();
                  }
                }
                </script>
              </div>
              <?php if ($_SESSION['user_type'] == 'studente'): ?>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="filtraPreferiti" onchange="filtraPreferiti(this.checked)" <?php if (isset($_GET['salvati']))echo "checked=\"checked\"" ?>>
                <label class="custom-control-label" for="filtraPreferiti" >Mostra solo i docenti salvati</label>
                <script type="text/javascript">
                var filtraPreferiti = function(c){
                  if (c){
                    $("[preferito='0']").hide();
                  }else{
                    $("[preferito='0']").show();
                  }
                }

                </script>
              </div>
            <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-sm-12">
        <?php foreach ($docenti as $docente): ?>
          <?php if ($docente['count']): ?>
            <div class="card text-white o-hidden bg-primary mb-3" attivo="si" name="docente" preferito="<?php echo +$docente['preferito'] ?>">
          <?php else: ?>
            <div class="card text-white o-hidden bg-secondary mb-3" attivo="no" name="docente" preferito="<?php echo +$docente['preferito'] ?>">
          <?php endif; ?>
            <div class="card-body">
              <div class="card-body-icon">
                <?php if ($docente['tipo'] == 'admin'): ?>
                  <i class="fas fa-user-graduate"></i>
                <?php else: ?>
                  <i class="fas fa-user"></i>
                <?php endif; ?>
              </div>
              <div class="mr-5">
                <h2><?php echo $docente['nome']. " " .$docente['cognome']?></h2>
                <h5><?php echo $docente['tipo'] ?></h5>
              </div>
            </div>
            <div class="card-footer">
              <form method="post">
              <button type="button" class="btn bg-white" onclick="window.location='../lezioni/?utente=<?php echo $docente['id'] ?>'" <?php if (!$docente['count']): ?>disabled="disabled" title="nessuna lezione" <?php endif; ?>>
                <i class="fas fa-book"></i> Visualizza lezioni
              </button>
              <?php if ($_SESSION['user_type'] == 'studente'): ?>
                <?php if ($docente['preferito']): ?>
                  <button type="submit" name="submit" value="<?php echo $docente['id'] ?>" class="btn bg-white">
                    <i class="fas fa-bookmark"></i> Salva
                  </button>
                  <input type="hidden" name="save" value="0">
                <?php else: ?>
                  <button type="submit" name="submit" value="<?php echo $docente['id'] ?>" class="btn bg-white">
                    <i class="far fa-bookmark"></i> Salva
                  </button>
                  <input type="hidden" name="save" value="1">
                <?php endif; ?>
              <?php endif; ?>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    </div>
  </div>
</div>

<script type="text/javascript">
<?php if (isset($_GET['salvati'])) {
  echo "filtraPreferiti(1)";
} ?>
</script>
