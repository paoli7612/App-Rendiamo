<div class="w3-panel">
  <h1>Nuova lezione</h1>
  <form method="post">
    <div class="w3-animate-top w3-container w3-theme-l2 w3-card-4">
      <div class="w3-half">
        <div class="w3-panel">
          <input class="w3-input" type="text" name="titolo" placeholder="Titolo" required="required">
        </div>
        <div class="w3-panel">
          <input class="w3-input" type="date" name="data" id="date">
        </div>
        <div class="w3-panel">
          <textarea class="w3-input" name="note" rows="3" placeholder="Note"></textarea>
        </div>
      </div>
      <div class="w3-half">
        <div class="w3-panel">
          <table class="w3-table w3-table-all w3-white">
            <?php foreach ($materie as $materia): ?>
              <tr onclick="select(<?php echo $materia->id ?>)" id="tr_<?php echo $materia->id ?>">
                <td><?php echo $materia->titolo ?></td>
                <td><input
                  name="<?php echo $materia->id ?>"
                  type="checkbox"
                  class="w3-check w3-hide"
                  id="check_<?php echo $materia->id ?>"
                  onclick="select(<?php echo $materia->id ?>)">
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
    <div class="w3-panel">
      <input class="w3-button w3-right w3-theme-l2" type="submit" value="Conferma">
    </div>
  </form>
</div>
<script src="script.js">
</script>
