<?php
  $isUtente = isset($_GET['utente']);
  if ($isUtente){
    $lezioni = getLezioniIdUtente($_GET['utente']);
  } else {
    $lezioni = getLezioni();
  }
?>
<?php if ($isUtente): ?>
  <?php $utente = getUtenteId($_GET['utente']); ?>
  <h1>&nbsp;<?php echo $utente->nome . " " . $utente->cognome ?></h1>
<?php endif; ?>

<?php if (isset($_SESSION['delete_lezione'])): ?>
  <?php unset($_SESSION['delete_lezione']) ?>
  <div class="w3-panel">

  </div>
  <div>
    <div class="w3-panel w3-theme w3-display-container w3-card-4">
      <span onclick="this.parentElement.style.display='none'"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h2>Fantastico!</h2>
      <p>Lezione eliminata correttamente.</p>
    </div>
  </div>
<?php endif; ?>

<table id="t1" class="w3-animate-left w3-white w3-table w3-table-all w3-card-4 w3-hoverable">
  <tr class="w3-theme-l3">
    <th onclick="sortTable('t1', 0)">Titolo</th>
    <?php if (!$isUtente): ?>
      <th onclick="sortTable('t1', 1)">Professore</th>
    <?php endif; ?>
    <th onclick="sortTable('t1', 2)">Materia</th>
    <th onclick="sortTable('t1, 3')" class="w3-hide-small">Data</th>
  </tr>
<?php foreach ($lezioni as $lezione): ?>
  <tr onclick="window.location='../lezioni/?id=<?php echo $lezione->id ?>'">
    <?php
      echo '<td>'.$lezione->titolo.'</td>';
    ?>
    <?php if (!$isUtente): ?>
      <td>
        <?php echo $lezione->utente->nome. " " . $lezione->utente->cognome; ?>
      </td>
    <?php endif; ?>
    <td>
      <?php
        $string = "";
        foreach ($lezione->materie as $materia) {
          $string .= $materia->titolo. ", ";
        }
        echo substr($string, 0, -2);
      ?>
    </td>
    <td class="w3-hide-small">
      <?php echo $lezione->getData('l j F'); ?>
    </td>
  </tr>
<?php endforeach; ?>
</table>
