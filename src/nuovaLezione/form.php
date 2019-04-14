<input type="hidden" id="idUtente" value="<?php echo $_SESSION['user_row']['id'] ?>">

<div class="container">
  <form method="post">
    <div class="form-group">
      <div class="form-label-group">
        <input id="inputTitolo" onchange="controlTitolo(this)" name="titolo" type="text" class="form-control" placeholder="Titolo" required="required" autofocus="autofocus">
        <label for="inputTitolo">Titolo</label>
      </div>
    </div>
    <div id="error">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Attenzione!</strong> Titolo gia utilizzato per un'altra lezione da te creata.
      </div>
    </div>
    <div class="form-group">
      <div class="form-label-group">
        <input id="inputDescrizione" name="note" type="text" class="form-control" placeholder="Descrizione">
        <label for="inputDescrizione">Descrizione</label>
      </div>
    </div>
    <div class="form-group">
      <div class="form-label-group">
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Materie">
          Seleziona materie
        </button>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Etichette">
          Aggiungi etichette
        </button>
      </div>
    </div>
    <?php include '../modalMaterie.php' ?>
    <div class="modal fade" id="Etichette" tabindex="-1" role="dialog" aria-labelledby="EtichetteTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="EtichetteTitle">Seleziona etichette:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Le etichette servono a semplificare la ricerca della lezione utilizzando queste parole chiave. Usa spazio per dividere un etichetta dal altra</p>
            <div class="form-group">
              <div class="form-label-group">
                <input id="inputEtichetta" type="text" class="form-control" placeholder="Etichette" onkeyup="keyupEtichetta(this)">
                <label for="inputEtichetta">Etichette</label>
              </div>
            </div>
            <div id="etichette">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Conferma</button>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Crea nuova lezione</button>
  </form>
</div>
<script type="text/javascript" src="script.js"></script>
<!-- Button trigger modal -->
