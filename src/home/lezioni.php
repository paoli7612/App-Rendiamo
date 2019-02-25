<?php $lezioni = getLezioni();
  $materie = getMaterie();?>
<div>
  <h1>Lezioni</h1>
  <table border="2">
    <tr>
      <th>idUtente</th>
      <th>titolo</th>
      <th>materie</th>
    </tr>
  <?php foreach ($lezioni as $lezione): ?>
    <tr>
      <?php
        echo '<td>'.$lezione->idUtente.'</td>';
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


</div>
