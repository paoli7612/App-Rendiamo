<h1>login</h1>

<form action="index.php" method="post">
  <input type="text" name="email" placeholder="email" required="required">
  <input type="password" name="password" placeholder="password" required="required">
  <input type="submit">
</form>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "../database.php";
    $utenti = getUtenti();
    foreach ($utenti as $utente) {
      if ($utente->email == $_POST['email']){
        if ($utente->password == $_POST['password']){
          session_start();
          $_SESSION['utente'] = $utente;
          header('Location: ../');
        }
      }
    }
    echo "login fallito";
  }
?>
