<div class="card">
  <div class="card-header">
    Nuova lezione
    <a class="float-right">
      <i class="fas fa-plus"></i>
    </a>
  </div>
  <div class="card-body">
    <form action="post.php" method="post">
      <div class="form-group">
        <label for="inputTitolo">Titolo</label>
        <input type="text" class="form-control" id="inputTitolo" placeholder="Titolo" name="titolo" required="required" onkeyup="controllaTitolo(this.value)">
      </div>
      <div id="error" style="display: none">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Attenzione!</strong> Hai gia usato questo titolo per una lezione.
        </div>
      </div>
      <div class="form-group">
        <label for="inputDescrizione">Descrizione</label>
        <input type="text" class="form-control" id="inputDescrizione" placeholder="Descrizione" name="note">
      </div>
      <button type="submit" class="btn btn-primary ml-3 float-right">Crea nuova lezione</button>
      <button type="button" class="btn btn-secondary float-right">Annulla</button>
    </form>
  </div>
</div>
