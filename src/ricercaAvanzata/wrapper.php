<div id="wrapper">

  <?php $title="lezioni" ?>
  <?php include '../wrapper_head.php' ?>

  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../filtra/">Lezioni</a>
        </li>
        <li class="breadcrumb-item active">Ricerca avanzata</li>
      </ol>
      <div class="row">
        <?php if ($_SESSION['user_type'] == 'studente'): ?>
          <?php include 'aiuto.php' ?>
        <?php endif; ?>
        <div class="col">
          <?php include 'form.php' ?>
        </div>
      </div>
    </div>
  </div>
</div>
