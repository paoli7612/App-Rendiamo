<?php

  class Lezione {
    public $row;
    public $id;

    public $utente;

    public function __construct($row){
      $this->row = $row;
      $this->id = $row['id'];
    }

    public function loadUtente(){
      $this->utente = getUtenteId($this->row["idUtente"]);
    }

  }

?>
