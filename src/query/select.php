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
  return query("SELECT m.id, m.titolo
    FROM lezioni as l, riguardano as r, materie as m
    WHERE l.id=r.idLezione
      AND m.id=r.idMateria;
    ", "materia");
}
?>
