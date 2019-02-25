<?php
  include "../query/database.php";
  session_start();
  if ($_SESSION['login']){
    $utente = new Utente($_SESSION['utente']);
  } else {
    header('Location: /App-Rendiamo/src/');
  }
?>


<a href="/App-Rendiamo/src/home/">
  <button>Home</button>
</a>
<a href="/App-Rendiamo/src/account/">
  <button>Account</button>
</a>
<a href="/App-Rendiamo/src/logout.php">
  <button>Logout</button>
</a>
<?php if ($utente->tipo!='studente'): ?>
  <a href="/App-Rendiamo/src/nuovaLezione/">
    <button>Nuova Lezione</button>
  </a>
<?php endif; ?>
