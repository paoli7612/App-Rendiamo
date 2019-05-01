<div class="card">
  <div class="card-header">
    Elimina lezione
    <a class="float-right">
      <i class="fas fa-trash"></i>
    </a>
  </div>
  <div class="card-body">
    <form action="post.php" method="post">
      <input type="hidden" name="idLezione" value="<?php echo $_GET['id'] ?>">
      <div class="row col">
        <h5>Eliminare davvero la lezione?</h5>
      </div>
      <button type="submit" class="btn btn-primary ml-3 float-right">Elimina</button>
      <button type="button" class="btn btn-secondary float-right" onclick="window.location='../lezione/?id=<?php echo $idLezione ?>'">Annulla</button>
    </form>
  </div>
</div>
