<?php

  class Materia {
    public $row;

    public $lezioni;
    public $utenti;

    public function __construct($row){
      $this->row = $row;
    }

    public function loadUtenti(){
      $this->utenti = getUtentiMateriaTitolo($this->row["titolo"]);
    }

    public function loadLezioni(){
      $this->lezioni = getLezioniMateriaTitolo($this->row["titolo"]);
    }

  }

?>
