<div id="wrapper">

  <?php $title="lezione" ?>
  <?php include '../wrapper_head.php' ?>
  <?php $id = $_GET['id'] ?>
  <?php $lezione = query("SELECT lezioni.* FROM lezioni WHERE lezioni.id=$id ")[0] ?>
  <?php $altros = query("SELECT * FROM materiali, materialidilezioni WHERE materiali.tipo='Altro' AND materiali.id=materialidilezioni.idMateriale AND materialidilezioni.idLezione=".$lezione['id']) ?>

  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../lezioni/">Lezioni</a>
        </li>
        <li class="breadcrumb-item">
          <a href="../lezione/?id=<?php echo $lezione['id'] ?>"><?php echo $lezione['titolo'] ?></a>
        </li>
        <li class="breadcrumb-item active">Altro</li>
      </ol>

      <div class="row">
        <div class="col">
          <?php if ($altros): ?>
            <?php foreach ($altros as $altro): ?>
              <?php echo $altro['titolo'].".".$altro['estensione'] ?>
              <br>
            <?php endforeach; ?>
          <?php else: ?>
            <p>Nessun altro caricato</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
