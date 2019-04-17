<div id="wrapper">

  <?php $title="lezione" ?>
  <?php include '../wrapper_head.php' ?>
  <?php $id = $_GET['id'] ?>
  <?php $conferma = $_GET['conferma'] ?>
  <?php if ($conferma) {
    query("DELETE FROM lezioni WHERE id=$id");
    header('../home');
  } ?>
  <?php $lezione = query("SELECT lezioni.* FROM lezioni WHERE lezioni.id=$id")[0]?>
  <?php lezione_docente($lezione)?>

  <div id="content-wrapper">
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../lezioni/">Lezioni</a>
        </li>
        <li class="breadcrumb-item">
          <a href="../lezione/?id=<?php echo $lezione['id'] ?>"><?php echo $lezione['titolo'] ?></a>
        </li>
        <li class="breadcrumb-item active">Elimina lezione</li>
      </ol>
      <div class="container">

        <div class="card mx-auto mt-5">
          <div class="card-header">
            Elimina lezione
            <i class="fas fa-trash float-right"></i>
          </div>
          <div class="card-body">
            <h3>Eliminare davvero la lezione "<?php echo $lezione['titolo'] ?>" ?</h3>
          </div>
          <div class="card-footer">
            <button type="button" name="button" class="btn btn-success" onclick="window.location='../eliminaLezione/?conferma=1&id=<?php echo $lezione['id']?>'">
              <i class="fas fa-check"></i>
              Elimina
            </button>
            <button type="button" name="button" class="btn btn-danger" onclick="window.location='../lezione/?id=<?php echo $lezione['id']?>'">
              <i class="fas fa-times"></i>
              Annulla
            </button>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
