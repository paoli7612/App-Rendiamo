<?php
  include "../classes/Utente.php";
  session_start();
  if ($_SESSION['utente']){
    $utente = new Utente($_SESSION['utente']);
  } else {
    header('Location: /App-Rendiamo/src/');
  }
?>

<div class="w3-bar">
  <a href="/App-Rendiamo/src//home/">
    <button class="w3-button w3-bar-item">Home</button>
  </a>
  <a href="/App-Rendiamo/src//account/">
    <button class="w3-button w3-bar-item">Account</button>
  </a>
  <a href="/App-Rendiamo/src//logout.php">
    <button class="w3-button w3-bar-item">Logout</button>
  </a>
</div>
