<?php
  $materiali = getMateriali();
?>
<table class="w3-white w3-table w3-table-all w3-card-4 w3-hoverable">
  <tr class="w3-theme-l3">
    <th>Titolo</th>
    <th>Materia</th>
  </tr>
<?php foreach ($lezioni as $lezione): ?>
  <tr onclick="window.location='../lezioni/?id=<?php echo $lezione->id ?>'">
    <?php
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
