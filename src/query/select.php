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

function getMaterieIdLezione($idLezione){
  return query("SELECT m.*
    FROM lezioni as l, materieDiLezioni as d, materie as m
    WHERE l.id=d.idLezione
      AND m.id=d.idMateria;
    ", "materia");
}

function getLezioneId($id){
    return query("SELECT * FROM lezioni WHERE id=$id;", "lezione")[0];
}

function getUtenteId($id){
    return query("SELECT * FROM utenti WHERE id=$id;", "utente")[0];
}
?>
