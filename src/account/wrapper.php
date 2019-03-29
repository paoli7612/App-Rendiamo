<div id="wrapper">

  <?php $title="account" ?>
  <?php include '../wrapper_head.php' ?>
  <?php  $id=$_SESSION['user_row']['id'] ?>
  <?php $utente = query("SELECT * FROM utenti WHERE id=$id")[0] ?>
  <div id="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <img src="../img/avatar/<?php echo rand(1,5); ?>.png" style="width: 100%" class="rounded float-left">
        </div>
        <div class="col-md-9">
          <div class="row">
            <h1><?php echo $utente['nome']. " " .$utente['cognome'] ?></h1>
          </div>
          <div class="row">
            <h4><?php echo $utente['tipo']?></h1>
          </div>
        </div>
        <div class="col-md-9">
        </div>
      </div>
    </div>
  </div>
</div>
