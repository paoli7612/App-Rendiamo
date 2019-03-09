<?php

  // UTENTE

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

  // MATERIA

  function getMaterie(){
    $sql = "SELECT *
    FROM materie;";
    return query($sql, 'materia');
  }

  function getMateriaId($id){
    $sql = "SELECT *
    FROM materie
    WHERE id=$id;";
    return query($sql, 'materia');
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

  function getLezioniSearch($search){
    $sql = "SELECT DISTINCT titolo
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

  function getLezioniMateria($idMateria){
    $sql = "SELECT lezioni.*
    FROM lezioni, materiedilezioni
    WHERE materiedilezioni.idMateria=$idMateria
      AND materiedilezioni.idLezione=lezioni.id;";
    return query($sql, 'lezione');
  }

  function getLezioniSearchMateria($search,$idMateria){
    $sql = "SELECT DISTINCT lezioni.titolo
    FROM lezioni, materiedilezioni
    WHERE titolo LIKE '%$search%'
      AND materiedilezioni.idMateria=$idMateria
      AND materiedilezioni.idLezione=lezioni.id;";
    return query($sql, 'lezione');
  }

  function getLezioneTitoloUtente($titolo, $idUtente){
    $sql = "SELECT *
    FROM lezioni
    WHERE lezioni.idUtente='$idUtente'
      AND lezioni.titolo='$titolo';";
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
?>
