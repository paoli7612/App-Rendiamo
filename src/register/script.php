<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../query/database.php';

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $domandaSicurezza = $_POST['domandaSicurezza'];
    $rispostaSicurezza = $_POST['rispostaSicurezza'];

    $errors = newUtente($nome, $cognome, $email, $password, $domandaSicurezza, $rispostaSicurezza);
    if ($errors){
      ?>
      <div class="w3-panel w3-red w3-display-container w3-card-4">
        <span onclick="this.parentElement.style.display='none'"
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>Attenzione!</h2>
        <p>Esiste gia un account che possiede questo indirizzo email</p>
      </div>
      <?php
    } else {
      header('Location: ../');
    }
  }

?>
