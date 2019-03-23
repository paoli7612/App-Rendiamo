<?php

  // UTENTE

  function getUtenti(){
    $sql = "SELECT *
    FROM utenti;";
    return query($sql, 'utente');
  }

  function getUtenteId($id){
    $sql = "SELECT *
    FROM utenti
    WHERE id=$id;";
    return query($sql, 'utente');
  }

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

  function getUtentiCountLezioni(){
    $sql = "SELECT utenti.*, COUNT(lezioni.id) as countLezioni
    FROM utenti, lezioni
    WHERE utenti.id = lezioni.idUtente
    GROUP BY utenti.id;";
    return query($sql, 'materia');
  }

  // MATERIA

  function getMaterie(){
    $sql = "SELECT *
    FROM materie
    ORDER BY titolo;";
    return query($sql, 'materia');
  }

  function getMateriaId($id){
    $sql = "SELECT *
    FROM materie
    WHERE id=$id;";
    return query($sql, 'materia');
  }

  function getMaterialeIndirizzo($indirizzo){
    $sql = "SELECT *
    FROM materiali
    WHERE indirizzo='$indirizzo';";
    return query($sql, 'materiale');
  }

  function getMaterieCountLezioni(){
    $sql = "SELECT materie.*, COUNT(lezioni.id) as countLezioni
    FROM materie, materiedilezioni, lezioni
    WHERE materie.id = materiedilezioni.idMateria
      AND lezioni.id = materiedilezioni.idLezione
    GROUP BY materie.id;";
    return query($sql, 'materia');
  }

  // LEZIONE

  function getLezioniIdMateriaRicerca($idMateria, $ricerca){
    $sql = "SELECT DISTINCT lezioni.*
    FROM lezioni, materiedilezioni, etichettedilezioni, etichette
    WHERE materiedilezioni.idLezione=lezioni.id
      AND materiedilezioni.idMateria=$idMateria
      AND etichettedilezioni.idLezione=lezioni.id
      AND etichettedilezioni.idEtichetta=etichette.id
      AND (etichette.nome LIKE '%$ricerca%' OR lezioni.titolo LIKE '%$ricerca%');";
    return query($sql, 'lezione');
  }

  function getLezioniIdUtenteRicerca($idUtente, $ricerca){
    $sql = "SELECT DISTINCT lezioni.*
    FROM lezioni, etichettedilezioni, etichette
    WHERE lezioni.idUtente=$idUtente
      AND etichettedilezioni.idLezione=lezioni.id
      AND etichettedilezioni.idEtichetta=etichette.id
      AND (etichette.nome LIKE '%$ricerca%' OR lezioni.titolo LIKE '%$ricerca%');";
    return query($sql, 'lezione');
  }

  function getLezioniRicerca($ricerca){
    $sql = "SELECT DISTINCT lezioni.*
    FROM lezioni, etichettedilezioni, etichette
    WHERE etichettedilezioni.idLezione=lezioni.id
      AND etichettedilezioni.idEtichetta=etichette.id
      AND (etichette.nome LIKE '%$ricerca%' OR lezioni.titolo LIKE '%$ricerca%');";
    return query($sql, 'lezione');
  }

  function getLezioniLimit($limit){
    $sql = "SELECT *
    FROM lezioni
    LIMIT $limit";
    return query($sql, 'lezione');
  }

  function getLezioniSearch($search){
    $sql = "SELECT DISTINCT id, titolo
    FROM lezioni
    WHERE titolo LIKE '%$search%';";
    return query($sql, 'lezione');
  }

  function getLezioneId($id){
    $sql = "SELECT *
    FROM lezioni
    WHERE id=$id;";
    return query($sql, 'lezione');
  }

  function getLezioniIdMateria($idMateria){
    $sql = "SELECT lezioni.*
    FROM lezioni, materiedilezioni
    WHERE materiedilezioni.idMateria=$idMateria
      AND materiedilezioni.idLezione=lezioni.id;";
    return query($sql, 'lezione');
  }

  function getLezioniIdEtichetta($idEtichetta){
    $sql = "SELECT lezioni.*
    FROM lezioni, etichettedilezioni as r
    WHERE r.idEtichetta=$idEtichetta
      AND r.idLezione=lezioni.id;";
    return query($sql, 'lezione');
  }

  function getLezioniSearchMateria($search,$idMateria){
    $sql = "SELECT DISTINCT lezioni.*
    FROM lezioni, materiedilezioni
    WHERE titolo LIKE '%$search%'
      AND materiedilezioni.idMateria=$idMateria
      AND materiedilezioni.idLezione=lezioni.id;";
    return query($sql, 'lezione');
  }

  function getLezioniSearchEtichetta($search,$idEtichetta){
    $sql = "SELECT DISTINCT lezioni.*
    FROM lezioni, etichettedilezioni as r
    WHERE titolo LIKE '%$search%'
      AND r.idEtichetta=$idEtichetta
      AND r.idLezione=lezioni.id;";
    return query($sql, 'lezione');
  }

  function getLezioneTitoloUtente($titolo, $idUtente){
    $sql = "SELECT *
    FROM lezioni
    WHERE lezioni.idUtente='$idUtente'
      AND lezioni.titolo='$titolo';";
    return query($sql, 'lezione');
  }

  function getLezioniIdUtente($idUtente){
    $sql = "SELECT *
    FROM lezioni
    WHERE lezioni.idUtente=$idUtente;";
    return query($sql, 'lezione');
  }

  function getLezioniIdUtenteIdMateria($idMateria,$idUtente){
    $sql = "SELECT lezioni.*
    FROM lezioni, materiedilezioni
    WHERE lezioni.idUtente=$idUtente
      AND materiedilezioni.idMateria=$idMateria
      AND materiedilezioni.idLezione=lezioni.id;";
    return query($sql, 'lezione');
  }



  // MATERIALE

  function getMaterialiIdLezione($idLezione){
    $sql = "SELECT materiali.*
    FROM materiali,materialidilezioni as r
    WHERE materiali.id=r.idMateriale
      AND r.idLezione=$idLezione;";
    return query($sql, 'materiale');
  }

  // ETICHETTA

  function getEtichettaId($id){
    $sql = "SELECT *
    FROM etichette
    WHERE etichette.id=$id;";
    return query($sql, 'etichetta');
  }

  function getEtichettaNome($nome){
    $sql = "SELECT *
    FROM etichette
    WHERE etichette.nome='$nome';";
    return query($sql, 'etichetta');
  }

  function getEtichetteIdLezione($idLezione){
    $sql = "SELECT etichette.*
    FROM etichette,etichettedilezioni as r
    WHERE etichette.id=r.idEtichetta
      AND r.idLezione=$idLezione;";
    return query($sql, 'etichetta');
  }
?>
