<?php
  $utenti = getUtenti();
?>
<div class="w3-panel">
  <h1>Utenti</h1>
  <table class="w3-table w3-table-all w3-card-4" id="t1">
    <tr class="w3-theme-l2">
      <th onclick="sortTable('t1',0)">Nome</th>
      <th onclick="sortTable('t1',1)">Cognome</th>
      <th onclick="sortTable('t1',2)">Email</th>
      <th onclick="sortTable('t1',3)">Password</th>
      <th onclick="sortTable('t1',4)">Tipo</th>
    </tr>
  <?php foreach ($utenti as $utente): ?>
    <tr>
      <?php
        echo '<td>'.$utente->nome.'</td>';
        echo '<td>'.$utente->cognome.'</td>';
        echo '<td>'.$utente->email.'</td>';
        echo '<td>'.$utente->password.'</td>';
        echo '<td>'.$utente->tipo.'</td>';
      ?>
    </tr>
  <?php endforeach; ?>
  </table>
</div>
