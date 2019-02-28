<?php
  function permitAdmin($utente){
    if ($utente->tipo != 'admin'){
      header('Location: ..');
    }
  }

  function permitProfessore($utente){
    if ($utente->tipo == 'studente'){
      header('Location: ..');
    }
  }
?>
