<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="../lezione/?id=<?php echo $lezione['id'] ?>"><?php echo $lezione['titolo'] ?></a>
    </li>
    <li class="breadcrumb-item">
      Carica materiali
    </li>
  </ol>

  <div class="row">
    <div class="col">
      <?php include 'form.php' ?>
    </div>
  </div>
</div>
