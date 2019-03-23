<?php $lezione->loadMateriali(); ?>


<?php if ($lezione->materiali): ?>
<div class="w3-panel w3-half">
  <div class="w3-panel w3-blue w3-card-4">
    <h1>Materiali</h1>
    <div class="w3-panel">
      <table class="w3-table w3-table-all w3-card-4 w3-white">
      <?php foreach ($lezione->materiali as $materiale): ?>
        <tr>
          <th>
            <?php echo $materiale->row['titolo'] ?>
          </th>
          <td>
          <?php if ($materiale->row['tipo'] == 'pdf'): ?>
              <i class="fas fa-file-pdf"></i>
          <?php elseif (in_array($materiale->row['tipo'], array('py', 'c', 'cpp', 'html', 'php', 'lua', 'js', 'java'))): ?>
              <i class="fas fa-file-code"></i>
          <?php elseif (in_array($materiale->row['tipo'], array('mp4', 'avi'))): ?>
            <i class="fas fa-file-video"></i>
          <?php else: ?>
            <i class="fas fa-file"></i>
          <?php endif; ?>
        </td>
        <td>
          <?php echo $materiale->row['tipo'] ?>
        </td>
        </tr>
      <?php endforeach; ?>
    </table>
    </div>
  </div>
</div>
<?php endif; ?>
