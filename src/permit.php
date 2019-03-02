<?php
  function permitAdmin($utente){
    if ($utente->tipo != 'admin'){
      header('Location: ..');
    }
  }

  function permitLezione($utente, $lezione){

  }

  function permitProfessore($utente){
    if ($utente->tipo == 'studente'){
      header('Location: ..');
    }
  }
?>
