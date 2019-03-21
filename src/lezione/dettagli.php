
<div class="w3-panel">
  <div class="w3-panel w3-card-4 w3-blue">
    <h1 class="w3-left"><?php echo $lezione->row['titolo'] ?></h1>
    <?php if ($lezione->row['idUtente'] == $_UTENTE->id): ?>
      <h2 class="w3-right">
        &nbsp;&nbsp;
      <a href="../modificaLezione/?id=<?php echo $lezione->id ?>">
        <button class="w3-btn">
          <i class="fas fa-edit"></i>
        </button>
      </a>
    </h2>
    <?php endif; ?>
  </div>
</div>

<?php include 'materiali.php' ?>

<?php include 'etichette.php' ?>
