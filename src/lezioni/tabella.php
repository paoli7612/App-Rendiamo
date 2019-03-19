<?php if (isset($lezioni)): ?>
  <table>
    <?php foreach ($lezioni as $lezione): ?>
      <tr>
        <td>
          <?php echo $lezione->row['titolo'] ?>
        </td>
        <td>
          <?php echo $lezione->row['id'] ?>
        </td>
        <td>
          <a href="../lezione/?id=<?php echo $lezione->row['id'] ?>">Visualizza</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>
