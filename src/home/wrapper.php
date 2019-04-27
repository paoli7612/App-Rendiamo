<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Apprendiamoci</h1>
    <p class="lead text-muted"><?php echo $_SESSION['user_row']['nome'] ?> bentornato su Apprendiamoci</p>
  </div>
</section>

<div class="container">
  <div class="row">
    <?php if ($_SESSION['user_row']['tipo'] == 'studente'): ?>
      <?php include 'studente.php' ?>
    <?php else: ?>
      <?php include 'docente.php' ?>
    <?php endif; ?>
  </div>
</div>
