<?php if (isset($lezioni)): ?>
  <div class="w3-panel">
    <table class="w3-table w3-table-all w3-card-4 w3-white">
      <tr>
        <th>Titolo</th>
        <th>Docente</th>
        <th>Etichette</th>
      </tr>
      <?php foreach ($lezioni as $lezione): ?>
        <?php $lezione->loadUtente() ?>
        <?php $lezione->loadEtichette() ?>
        <tr class="w3-hover-blue" onclick="window.location='../lezione/?id=<?php echo $lezione->row['id'] ?>'">
          <td>
            <?php echo $lezione->row['titolo'] ?>
          </td>
          <td>
            <?php echo $lezione->utente->row['cognome']." ".$lezione->utente->row['nome'] ?>
          </td>
          <td>
            <?php foreach ($lezione->etichette as $etichetta): ?>
              <?php echo $etichetta->row['nome'] ?>
            <?php endforeach; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
<?php endif; ?>
