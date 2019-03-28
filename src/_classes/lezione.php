<?php

  class Lezione {
    public $row;
    public $id;

    public $utente;
    public $materiali;
    public $etichette;

    public function __construct($row){
      $this->row = $row;
      $this->id = $row['id'];
    }

    public function loadUtente(){
      $this->utente = getUtenteId($this->row["idUtente"])[0];
    }

    public function loadMateriali(){
      $this->materiali = getMaterialiIdLezione($this->id);
    }

    public function loadEtichette(){
      $this->etichette = getEtichetteIdLezione($this->id);
    }

    public function isPreferito($utente){
      
    }

  }

?>
