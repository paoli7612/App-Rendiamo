<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--<link rel="icon" href="../favicon.ico" type="image/ico">-->
    <!--<link rel="stylesheet" href="https://cdn.clarkhacks.com/OpenDyslexic/v2/OpenDyslexic.css">-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../_head/master.js"></script>
    <link rel="stylesheet" href="../_head/master.css">
  </head>


<?php


  // viene lanciata nelle pagine permesse solo agli admin
  // quindi controllare se l'utente lo è...
  // in caso contrario riportarlo alla home
  // function admin($utente)

  // idem per le pagine riservate ai docenti(e agli admin ovviamente)
  // function docente($utente)

  // idem per i proprietari delle lezioni(che possono tipo modificarle) (anche admin)
  // function utenteDiLezione($utente, $lezione)

  // se non si hanno i permessi reindirizziamo l'utente alla home
  // header('location: ../home/')

  // per leggere gli attributi del utente
  // $utente->row['tipo'] che puo essere 'studente' o 'docente' o 'admin'
  // per leggere gli attributo della lezione
  // $lezione->row['titolo']



?>
