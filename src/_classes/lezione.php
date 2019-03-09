<?php

  class Lezione {
    public $row;
    public $id;

    public $utente;
    public $materiali;

    public function __construct($row){
      $this->row = $row;
      $this->id = $row['id'];
    }

    public function loadUtente(){
      $this->utente = getUtenteId($this->row["idUtente"]);
    }

    public function loadMateriali(){
      $this->materiali = getMaterialiIdLezione($this->id);
    }
  }

?>
