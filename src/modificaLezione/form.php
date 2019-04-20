<div class="card">
  <div class="card-header">
    Modifica lezione
    <a class="float-right">
      <i class="fas fa-edit"></i>
    </a>
  </div>
  <div class="card-body">
    <form action="post.php" method="post">
      <input type="hidden" name="idLezione" value="<?php echo $_GET['id'] ?>">
      <div class="form-group">
        <label for="inputTitolo">Titolo</label>
        <input type="text" class="form-control" id="inputTitolo" placeholder="Titolo" name="titolo" required="required" value="<?php echo $lezione['titolo'] ?>" onkeyup="controllaTitolo(this.value)">
      </div>
      <div id="error" style="display: none">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Attenzione!</strong> Hai gia usato questo titolo per una lezione.
        </div>
      </div>
      <div class="form-group">
        <label for="inputDescrizione">Descrizione</label>
        <input type="text" class="form-control" id="inputDescrizione" placeholder="Descrizione" name="note" value="<?php echo $lezione['note'] ?>">
      </div>
      <button type="submit" class="btn btn-primary ml-3 float-right">Salva</button>
      <button type="button" class="btn btn-secondary float-right" onclick="window.location='../lezione/?id=<?php echo $idLezione ?>'">Annulla</button>
    </form>
  </div>
</div>
