<?php

  class Lezione {
    public $row;

    public $utente;

    public function __construct($row){
      $this->row = $row;
    }

    public function loadUtente(){
      $this->utente = getUtenteId($this->row["idUtente"]);
    }

  }

?>
