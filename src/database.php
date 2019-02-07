<?php
  include "classes/Utente.php";
  include "classes/Lezione.php";
  include "classes/Materia.php";

  function query($sql, $classe){
    $conn = new mysqli("localhost", "root", "", "lele");
    $tabella = array();
    $result = $conn->query($sql);
    //print_r($sql);
    if ($classe=="vuoto"){return $conn->error;}
    if ($result->num_rows == 0) {
      return $tabella;
    } else while($row = $result->fetch_assoc()){
      if ($classe == "utente") $oggetto = new Utente($row);
      elseif ($classe == "lezione") $oggetto = new Lezione($row);
      elseif ($classe == "materia") $oggetto = new Materia($row);
      array_push($tabella, $oggetto);
    }
    $conn->close();
    return $tabella;
  }

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


  function newUtente($nome, $cognome, $email, $password, $domandaSicurezza, $rispostaSicurezza, $tipo, $anno){
    return query("INSERT INTO `utenti`
      (`email`,`password`,`nome`,`cognome`,`domandaSicurezza`,`rispostaSicurezza`,`anno`,`tipo`)
      VALUES ('$email', '$password', '$nome', '$cognome', '$domandaSicurezza','$rispostaSicurezza', $anno, '$tipo');
      ", "vuoto");
  }


?>
