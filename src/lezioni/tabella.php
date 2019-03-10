

<?php if (isset($materia)): ?>
  <input type="hidden" id="materia" value="<?php echo $materia->row['id']; ?>">
<?php else: ?>
  <input type="hidden" id="etichetta" value="<?php echo $materia->row['id']; ?>">
<?php endif; ?>
<input type="text" id="search" onkeyup="update()">
<table id="result">
</table>
<script type="text/javascript" src="script.js"></script>


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
