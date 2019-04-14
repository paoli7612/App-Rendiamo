<form method="post" action="../risultatoRicerca/">
  <div class="form-group">
    <div class="form-label-group">
      <input id="inputRicerca" name="ricerca" type="text" class="form-control" placeholder="Ricerca" autofocus="autofocus">
      <label for="inputRicerca">Ricerca</label>
    </div>
  </div>
  <div class="form-group">
    <div class="form-label-group">
      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Materie">
        Seleziona materie
      </button>
      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Docenti">
        Seleziona docente
      </button>
    </div>
  </div>
  <?php include '../modalMaterie.php' ?>
  <?php include '../modalDocenti.php' ?>
  <button type="submit" class="btn btn-primary btn-block">Crea nuova lezione</button>
</form>
