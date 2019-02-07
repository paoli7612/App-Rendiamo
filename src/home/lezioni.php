<?php $lezioni = getLezioni();
  $materie = getMaterie();?>
<div class="w3-panel">

  <h1>Lezioni</h1>
  <table class="w3-table w3-table-all">
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
