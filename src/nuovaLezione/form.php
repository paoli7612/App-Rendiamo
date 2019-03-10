<h1>Nuova lezione</h1>
<form method="post">
  <input type="hidden" id="idUtente" value="<?php echo $_UTENTE->id ?>">
  <input type="text" id="titolo" name="titolo" onchange="update(this.value)" placeholder="Titolo" required="required" maxlength="40">
  <span id="error"></span>
  <input type="date" name="data" id="date">
  <input type="text" name="etichette" placeholder="Etichette">
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
  <button type="submit" id="submit">Crea lezione</button>
</form>

<script src="script.js">
</script>
