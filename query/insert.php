<?php
  function newUtente($nome, $cognome, $email, $password, $domandaSicurezza, $rispostaSicurezza){
    return query("INSERT INTO `utenti`
      (`email`,`password`,`nome`,`cognome`,`domandaSicurezza`,`rispostaSicurezza`)
      VALUES ('$email', '$password', '$nome', '$cognome', '$domandaSicurezza','$rispostaSicurezza');
      ", "vuoto");
  }

  function newLezione($idUtente, $titolo, $data, $note){
    return query("INSERT INTO `lezioni`
      (`idUtente`,`titolo`,`data`, `note`)
      VALUES ('$idUtente', '$titolo', '$data', '$note');
      ", "vuoto");
  }

  function newMateriale($indirizzo, $titolo){
    return query("INSERT INTO `materiali`
      (`indirizzo`, `titolo`)
      VALUES ('$indirizzo', '$titolo');
      ", "vuoto");
  }

  function newMaterialeDiLezione($idMateriale, $idLezione){
    return query("INSERT INTO `materialidilezioni`
      (`idMateriale`, `idLezione`)
      VALUES ('$idMateriale', '$idLezione');
      ", "vuoto");
  }

  function newMateriaDiLezione($idMateria, $idLezione){
    return query("INSERT INTO `materiedilezioni`
      (`idMateria`, `idLezione`)
      VALUES ('$idMateria', '$idLezione');
      ", "vuoto");
  }
?>
