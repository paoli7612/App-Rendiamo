<div id="wrapper">

  <?php $title="lezione" ?>
  <?php include '../wrapper_head.php' ?>
  <?php $id = $_GET['id'] ?>
  <?php $lezione = query("SELECT lezioni.* FROM lezioni WHERE lezioni.id=$id ")[0] ?>
  <?php $mappe = query("SELECT * FROM materiali, materialidilezioni WHERE materiali.tipo='Documento' AND materiali.id=materialidilezioni.idMateriale AND materialidilezioni.idLezione=".$lezione['id']) ?>

  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../lezioni/">Lezioni</a>
        </li>
        <li class="breadcrumb-item">
          <a href="../lezione/?id=<?php echo $lezione['id'] ?>"><?php echo $lezione['titolo'] ?></a>
        </li>
        <li class="breadcrumb-item active">Mappe concettuali</li>
      </ol>

      <div class="row">
        <div class="col">
          <?php if ($mappe): ?>
            <?php foreach ($mappe as $mappa): ?>
              <?php echo $mappa['titolo'].".".$mappa['estensione'] ?>
              <br>
            <?php endforeach; ?>
          <?php else: ?>
            <p>Nessuna mappa concettuale caricata</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
