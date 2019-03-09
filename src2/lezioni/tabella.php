<p> Cera lezione per <?php echo $materia->row['titolo']; ?></p>
<input type="text" id="search" onkeyup="update()">
<input type="hidden" id="materia" value="<?php echo $materia->row['id']; ?>">

<?php $lezioni = getLezioniMateria($materia->row['id']); ?>
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


<!-- qua Si Crea questo:
<table id="result">
    <tr></td>
      <a href="../lezione/?id=[idLezione]">
      [titoloLezione]
    </td></tr>
    <script type="text/javascript" src="script.js"></script>
</table>
-->
