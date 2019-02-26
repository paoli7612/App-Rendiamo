<?php
  $lezioni = getLezioni();
?>
<table border="2">
  <tr>
    <th colspan="2">Creata da</th>
    <th>titolo</th>
    <th>materie</th>
  </tr>
<?php foreach ($lezioni as $lezione): ?>
  <tr>
    <?php
      echo '<td>'.$lezione->utente->nome.'</td>';
      echo '<td>'.$lezione->utente->cognome.'</td>';
      echo '<td>'.$lezione->titolo.'</td>';
    ?>
    <td>
      <?php foreach ($lezione->materie as $materia) {
        echo $materia->titolo. ", ";
      } ?>
    </td>
  </tr>
<?php endforeach; ?>
</table>
