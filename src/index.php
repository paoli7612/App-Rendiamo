

<?php
  include "database.php";

  $utenti = getUtenti();
  $lezioni = getLezioni();
?>

<table border="2">
  <?php foreach ($utenti as $utente): ?>
  <tr>
    <?php
      foreach ($utente as $v) {
        echo "<td>$v</td>";
      }
    ?>
  </tr>
  <?php endforeach; ?>
</table>

<table border="2">
  <?php foreach ($lezioni as $lezione): ?>
  <tr>
    <?php
      foreach ($lezione as $v) {
        echo "<td>$v</td>";
      }
    ?>
  </tr>
  <?php endforeach; ?>
</table>


<div>
  <form method="post">
    <h1>Entra</h1>
    <input type="file" name="upload" accept="application/pdf,application/vnd.ms-excel" />
    <input type="email" name="email" placeholder="email">
    <button type="submit"> Avanti </button>
  </form>
</div>

<?php print_r($_POST);
print_r(file($_POST['upload'])); ?>
