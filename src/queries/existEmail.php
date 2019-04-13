<?php

  include "../connection.php";

  $email = $_GET['email'];

  $q['utente'] = count(query("SELECT * FROM utenti WHERE email='$email'"));

  echo json_encode($q);

?>
