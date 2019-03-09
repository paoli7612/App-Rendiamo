<?php

  // LEZIONE

  function newLezione($idUtente, $titolo, $data, $note){
    $sql = "INSERT INTO lezioni (`idUtente`, `titolo`, `data`, `note`)
      VALUES ($idUtente, '$titolo', '$data', '$note')";
    return query($sql, 'vuoto');
  }

  // MATERIADILEZIONE

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

?>
