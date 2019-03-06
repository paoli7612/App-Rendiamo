<?php
function getUtenti(){
  return query("SELECT * FROM utenti;", "utente");
}

function getMaterie(){
  return query("SELECT * FROM materie;", "materia");
}

function getLezioni(){
  return query("SELECT * FROM lezioni;", "lezione");
}

function getUtenteEmail($email){
  return query("SELECT * FROM utenti WHERE email='$email';", "utente");
}

function getLezioniUltime($n){
  return query("SELECT * FROM lezioni ORDER BY data DESC LIMIT $n;", "lezione");
}

function getMaterieIdLezione($idLezione){
  return query("SELECT m.*
    FROM lezioni as l, materieDiLezioni as d, materie as m
    WHERE l.id=$idLezione
      AND d.idLezione=l.id
      AND d.idMateria=m.id
    ", "materia");
}

function getMaterialeIndirizzo($indirizzo){
  return query("SELECT *
    FROM materiali
    WHERE `indirizzo`='$indirizzo';
    ", "materiale");
}

function getMaterialiIdLezione($idLezione){
  return query("SELECT m.*
    FROM materiali as m, materialidilezioni as d
    WHERE d.idLezione=$idLezione
      AND d.idMateriale=m.id;
    ", "materiale");
}

function getLezioneId($id){
    return query("SELECT * FROM lezioni WHERE id=$id;", "lezione")[0];
}

function getUtenteId($id){
    return query("SELECT * FROM utenti WHERE id=$id;", "utente")[0];
}

function getLezioneTitoloUtente($titolo, $idUtente){
  return query("SELECT * FROM lezioni WHERE titolo='$titolo' AND idUtente='$idUtente';", "lezione")[0];
}
?>
