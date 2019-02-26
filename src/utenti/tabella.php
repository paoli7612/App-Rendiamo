<?php
  $utenti = getUtenti();
?>
<table border="2">
  <tr>
    <th>Nome</th>
    <th>Cognome</th>
    <th>Email</th>
    <th>Password</th>
    <th>Tipo</th>
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
