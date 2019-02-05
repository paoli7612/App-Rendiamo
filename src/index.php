

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
