<?php
  $utenti = getUtenti();
?>
  <h1>Utenti</h1>
  <table id="t1" class="table table-bordered">
    <tr>
      <th onclick="sortTable('t1',0)">Nome</th>
      <th onclick="sortTable('t1',1)">Cognome</th>
      <th onclick="sortTable('t1',2)">Email</th>
      <th onclick="sortTable('t1',3)">Password</th>
      <th onclick="sortTable('t1',4)">Tipo</th>
    </tr>
  <?php foreach ($utenti as $utente): ?>
    <tr>
      <?php
        echo '<td>'.$utente->row['nome'].'</td>';
        echo '<td>'.$utente->row['cognome'].'</td>';
        echo '<td>'.$utente->row['email'].'</td>';
        echo '<td>'.$utente->row['password'].'</td>';
        echo '<td>'.$utente->row['tipo'].'</td>';
      ?>
    </tr>
  <?php endforeach; ?>
  </table>
