<div class="container">
  <form method="post">
    <div class="form-group">
      <div class="form-label-group">
        <input name="email" type="text" class="form-control" placeholder="Titolo" required="required" autofocus="autofocus">
        <label for="inputEmail">Titolo</label>
      </div>
    </div>
    <div class="form-group">
      <div class="form-label-group">
        <input name="password" type="password" class="form-control" placeholder="Descrizione">
        <label for="inputPassword">Descrizione</label>
      </div>
    </div>
    <div class="form-group">
      <div class="form-label-group">
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong">
          Seleziona materie
        </button>
      </div>
    </div>
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Seleziona materie:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php  $materie=query("SELECT * FROM materie") ?>
            <?php foreach ($materie as $materia): ?>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="<?php echo $materia['id'] ?>"id="<?php echo $materia['id'] ?>">
                <label class="custom-control-label" for="<?php echo $materia['id'] ?>"><?php echo $materia['titolo'] ?></label>
              </div>
            <?php endforeach; ?>
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
<!-- Button trigger modal -->
