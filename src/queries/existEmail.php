<?php

  include "../connection.php";

  $email = addslashes($_GET['email']);

  $q['utente'] = count(query("SELECT * FROM utenti WHERE email='$email'"));

  echo json_encode($q);

?>
