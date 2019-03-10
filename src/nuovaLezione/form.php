<h1>Nuova lezione</h1>
<form method="post">
  <input type="text" name="titolo" placeholder="Titolo" required="required" maxlength="40">
  <input type="date" name="data" id="date">
  Etichette
  <input type="text" name="etichette">
  <textarea name="note" rows="3" placeholder="Note" maxlength="200"></textarea>
  <table>
    <?php $materie = getMaterie(); ?>
    <?php foreach ($materie as $materia): ?>
      <tr>
        <td><?php echo $materia->row['titolo'] ?></td>
        <td><input name="<?php echo $materia->id ?>" type="checkbox">
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <button type="submit" >Crea lezione</button>
</form>

<script src="script.js">
</script>
