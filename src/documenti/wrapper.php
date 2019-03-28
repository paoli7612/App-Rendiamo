<div id="wrapper">

  <?php $title="lezione" ?>
  <?php include '../wrapper_head.php' ?>
  <?php $id=$_GET['id'] ?>
  <?php $lezione=query("SELECT lezioni.* FROM lezioni WHERE lezioni.id=$id ")[0] ?>
  <?php $documenti=array(); //  ?>
  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../lezioni/">Lezioni</a>
        </li>
        <li class="breadcrumb-item">
          <a href="../lezione/?id=<?php echo $lezione['id'] ?>"><?php echo $lezione['titolo'] ?></a>
        </li>
        <li class="breadcrumb-item active">Documenti</li>
      </ol>

      <div class="row">
        <div class="col">
          <p>Nessun Documento caricato</p>
        </div>
      </div>
    </div>
  </div>
</div>
