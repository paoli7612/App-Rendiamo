<div class="w3-panel">

  <div class="w3-panel w3-card-4 w3-blue">
    <div class="w3-panel">
      <h1>Nuova lezione</h1>
    </div>
  </div>
  <div class="w3-panel w3-card-4 w3-blue">
    <form method="post">
      <input type="hidden" id="idUtente" value="<?php echo $_UTENTE->id ?>">
      <div class="w3-panel w3-half">
        <div class="w3-margin w3-row">
          <input class="w3-input radius-left w3-col" type="text" autofocus="autofocus" id="titolo" name="titolo" onchange="changeTitle(this.value)" placeholder="Titolo" required="required" maxlength="40"  style="width: 90%">
          <button type="button" class="w3-input w3-button w3-white radius-right w3-col" style="width: 10%"
            onclick="help(1)">
            <i class="fas fa-question"></i>
          </button>
          <span id="error"></span>
        </div>
        <div class="w3-margin w3-hide" id="help1">
          Il titolo rappresenta il nome della lezione e non può essere uguale a quello di una lezione da te gia creata
        </div>
        <div class="w3-margin">
          <input class="w3-input w3-round-xlarge" type="date" name="data" id="datePicker">
        </div>
        <div class="w3-margin w3-row">
          <textarea class="w3-input radius-left w3-col" name="note" rows="1" placeholder="Note" maxlength="200" style="width: 90%"></textarea>
          <button type="button" class="w3-input w3-button w3-white radius-right w3-col" style="width: 10%"
            onclick="help(2)">
            <i class="fas fa-question"></i>
          </button>
        </div>
        <div class="w3-margin w3-hide" id="help2">
          Aggiungi una breve descrizione della lezione (MAX 200 caratteri). Il campo non è obbligatorio.
        </div>
        <div class="w3-margin w3-row">
          <input class="w3-input radius-left w3-col" type="text" name="etichette" placeholder="Etichette" style="width: 90%">
          <button type="button" class="w3-input w3-button w3-white radius-right w3-col" style="width: 10%" onclick="help(3)">
            <i class="fas fa-question"></i>
          </button>
        </div>
        <div class="w3-margin w3-hide" id="help3">
          Aggiungi delle parole chiave per semplificare la ricerca della tua lezione. Dividi ogni parola da uno spazio.
        </div>
      </div>
      <div class="w3-panel w3-half">
        <div class="w3-margin">
          <?php $materie = getMaterie(); $n=0;?>
          <table class="w3-table w3-table-all w3-white w3-card-4">
            <?php foreach ($materie as $materia): ?>
              <tr onclick="select(<?php echo ++$n ?>)" id="tr_<?php echo $n ?>" >
                <input type="checkbox" id="input_<?php echo $n ?>" name="<?php echo $materia->id ?>" style="display: none;">
                <td>
                  <?php echo $materia->row['titolo'] ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
      <div class="w3-panel w3-right">
        <button class="w3-button w3-card-4 w3-white" type="submit" id="submit">Crea lezione</button>
      </div>
    </form>
  </div>

</div>

<script src="script.js">
</script>
