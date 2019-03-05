<?php
  $lezioni = getLezioni();
?>
<table id="t1" class="w3-white w3-table w3-table-all w3-card-4 w3-hoverable">
  <tr class="w3-theme-l3">
    <th onclick="sortTable('t1', 0)">Titolo</th>
    <th onclick="sortTable('t1', 1)">Materia</th>
    <th onclick="sortTable('t1', 2)">Utente</th>
  </tr>
<?php foreach ($lezioni as $lezione): ?>
  <tr onclick="window.location='../lezioni/?id=<?php echo $lezione->id ?>'">
    <?php
      echo '<td>'.$lezione->titolo.'</td>';
    ?>
    <td>
      <?php
        $string = "";
        foreach ($lezione->materie as $materia) {
          $string .= $materia->titolo. ", ";
        }
        echo substr($string, 0, -2);
      ?>
    </td>
    <td>
      <?php echo $lezione->utente->nome. " " . $lezione->utente->cognome; ?>
    </td>
  </tr>
<?php endforeach; ?>
</table>
