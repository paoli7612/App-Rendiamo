<?php
  function login($utente){
    session_destroy();
    session_start();
    $_SESSION['login'] = true;
    $_SESSION['utente'] = $utente->row;
    $_SESSION['utente_tipo'] = $utente->tipo;
    header('Location: ..');
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../query/database.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $utenti = getUtenteEmail($email);

    if ($utenti){
      $utente = $utenti[0];
      if ($utente->password == $password){
        login($utente);
      } else {
        ?>
        <div class="w3-panel w3-red w3-display-container w3-card-4">
          <span onclick="this.parentElement.style.display='none'"
          class="w3-button w3-large w3-display-topright">&times;</span>
          <h2>Attenzione!</h2>
          <p>La password inserita non corrisponde al indirizzo email.</p>
        </div>
        <?php
      }
    } else {
      ?>
      <div class="w3-panel w3-red w3-display-container w3-card-4">
        <span onclick="this.parentElement.style.display='none'"
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>Attenzione!</h2>
        <p>L'indirizzo email inserito non corrisponde a nessun account.</p>
      </div>
      <?php
    }

  }

?>
