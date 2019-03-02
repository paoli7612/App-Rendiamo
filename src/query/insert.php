<?php
  function newUtente($nome, $cognome, $email, $password, $domandaSicurezza, $rispostaSicurezza){
    return query("INSERT INTO `utenti`
      (`email`,`password`,`nome`,`cognome`,`domandaSicurezza`,`rispostaSicurezza`)
      VALUES ('$email', '$password', '$nome', '$cognome', '$domandaSicurezza','$rispostaSicurezza');
      ", "vuoto");
  }

  function newLezione($idUtente, $titolo, $data){
    return query("INSERT INTO `lezioni`
      (`idUtente`,`titolo`,`data`)
      VALUES ('$idUtente', '$titolo', '$data');
      ", "vuoto");
  }

  function newMateriale($indirizzo){
    return query("INSERT INTO `materiali`
      (`indirizzo`)
      VALUES ('$indirizzo');
      ", "vuoto");
  }

  function newMaterialeDiLezione($idMateriale, $idLezione){
    return query("INSERT INTO `materialidilezioni`
      (`idMateriale`, `idLezione`)
      VALUES ('$idMateriale', '$idLezione');
      ", "vuoto");
  }
?>
