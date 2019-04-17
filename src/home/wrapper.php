<div id="wrapper">

  <?php $title="home" ?>
  <?php include '../wrapper_head.php' ?>

  <div id="content-wrapper">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-5">Apprendiamoci</h1>
        <p class="lead">Bentornato <?php echo $_SESSION['user_row']['nome'] ?> su Apprendiamoci</p>
      </div>
    </div>
    <div class="container-fluid container marketing">

      <?php if ($_SESSION['user_row']['tipo'] == 'studente'): ?>
        <?php include 'studente.php' ?>
      <?php else: ?>
        <?php include 'docente.php' ?>
      <?php endif; ?>

    </div>
  </div>
</div>
