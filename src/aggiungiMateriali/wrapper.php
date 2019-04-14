<div id="wrapper">

  <?php $title="nuovaLezione" ?>
  <?php include '../wrapper_head.php' ?>

  <?php $id = $_GET['id'] ?>
  <?php $lezione = query("SELECT * FROM lezioni WHERE id=$id")[0]?>
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
        <li class="breadcrumb-item active">Aggiungi materiali</li>
      </ol>
      <?php include 'post.php' ?>
      <?php include 'form.php' ?>
    </div>
  </div>
</div>
