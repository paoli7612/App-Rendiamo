<div class="container">
  <form method="post">
    <div class="form-group">
      <div class="form-label-group">
        <input id="inputTitolo" onchange="controlTitolo(this)" name="titolo" type="text" class="form-control" placeholder="Titolo" value="<?php echo $lezione['titolo'] ?>" disabled="disabled">
        <label for="inputTitolo">Titolo</label>
      </div>
    </div>
    <div class="form-group">
      <div class="form-label-group">
        <input id="inputDescrizione" name="note" type="text" class="form-control" placeholder="Descrizione" value="<?php echo $lezione['note'] ?>">
        <label for="inputDescrizione">Descrizione</label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Salva</button>
  </form>
</div>
