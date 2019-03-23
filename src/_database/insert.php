<?php

  // LEZIONE

  function newLezione($idUtente, $titolo, $data, $note){
    $sql = "INSERT INTO lezioni (`idUtente`, `titolo`, `data`, `note`)
      VALUES ($idUtente, '$titolo', '$data', '$note')";
    return query($sql, 'vuoto');
  }

  // MATERIA

  function newMateriaDiLezione($idLezione, $idMateria){
    $sql = "INSERT INTO materiedilezioni (`idLezione`, `idMateria`)
      VALUES ($idMateria, $idLezione)";
    return query($sql, 'vuoto');
  }

  // UTENTE

  function newUtente($email, $password, $nome, $cognome, $domandaSicurezza, $rispostaSicurezza){
    $sql = "INSERT INTO utenti (`email`, `password`, `nome`, `cognome`, `domandaSicurezza`, `rispostaSicurezza`)
      VALUES ('$email', SHA('$password'), '$nome', '$cognome', '$domandaSicurezza', '$rispostaSicurezza')";
    return query($sql, 'vuoto');
  }

  // ETICHETTA

  function newEtichetta($nome){
    $sql = "INSERT INTO etichette (`nome`)
      VALUES ('$nome');";
    return query($sql, 'vuoto');
  }

  function newEtichettaDiLezione($idLezione, $idEtichetta){
    $sql = "INSERT INTO etichettedilezioni (`idLezione`,`idEtichetta`)
      VALUES ($idLezione, $idEtichetta);";
    return query($sql, 'vuoto');
  }

  // MATERIALE

  function newMateriale($indirizzo, $titolo, $tipo){
    $sql = "INSERT INTO materiali (`indirizzo`,`titolo`,`tipo`)
      VALUES ('$indirizzo', '$titolo', '$tipo');";
    return query($sql, 'vuoto');
  }

  function newMaterialeDiLezione($idLezione, $idMateriale){
    $sql = "INSERT INTO materialidilezioni (`idLezione`, `idMateriale`)
      VALUES ($idLezione, $idMateriale)";
    return query($sql, 'vuoto');
  }

?>
