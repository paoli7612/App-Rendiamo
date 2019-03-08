<?php

  function getUtenteEmail($email){
    $sql = "SELECT *
    FROM utenti
    WHERE email='$email';";
    return query($sql, 'utente');
  }

  function getUtenteEmailPassword($email, $password){
    $sql = "SELECT *
    FROM utenti
    WHERE email='$email'
      AND password=SHA('$password');";
    return query($sql, 'utente');
  }
?>
