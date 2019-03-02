<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  print_r($utente);
  $_SESSION['utente']['tema'] = $_POST['tema'];
  header('Location: ../account');
}
?>
<form method="post">
  <input type="text" name="tema" value="<?php echo $utente->tema ?>">
  <input type="submit" value="Conferma">
</form>
