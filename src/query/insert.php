<?php
  function newUtente($nome, $cognome, $email, $password, $domandaSicurezza, $rispostaSicurezza, $tipo, $anno){
    return query("INSERT INTO `utenti`
      (`email`,`password`,`nome`,`cognome`,`domandaSicurezza`,`rispostaSicurezza`,`anno`,`tipo`)
      VALUES ('$email', '$password', '$nome', '$cognome', '$domandaSicurezza','$rispostaSicurezza', $anno, '$tipo');
      ", "vuoto");
  }

  function newLezione($idUtente, $titolo, $data){
    return query("INSERT INTO `lezioni`
      (`idUtente`,`titolo`,`data`)
      VALUES ('$idUtente', '$titolo', '$data');
      ", "vuoto");
  }
?>
