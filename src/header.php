<?php
  include "../classes/Utente.php";
  session_start();
  if ($_SESSION['utente']){
    $utente = new Utente($_SESSION['utente']);
  } else {
    header('Location: /');
  }
?>

<div class="w3-bar">
  <a href="/home/">
    <button class="w3-button w3-bar-item">Home</button>
  </a>
  <a href="/account/">
    <button class="w3-button w3-bar-item">Account</button>
  </a>
  <a href="/logout.php">
    <button class="w3-button w3-bar-item">Logout</button>
  </a>
</div>
