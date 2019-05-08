<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="../lezione/?id=<?php echo $materiale['l_id'] ?>">
        <?php echo $materiale['l_titolo'] ?>
      </a>
    </li>
    <li class="breadcrumb-item">
      Elimina materiale
    </li>
  </ol>

  <div class="row">
    <div class="col">
      <?php include 'form.php' ?>
    </div>
  </div>

</div>
