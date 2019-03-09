<?php

  class Materia {
    public $row;
    public $id;

    public $lezioni;
    public $utenti;

    public function __construct($row){
      $this->row = $row;
      $this->id = $row['id'];
    }

    public function loadUtenti(){
      $this->utenti = getUtentiMateriaTitolo($this->row["titolo"]);
    }

    public function loadLezioni(){
      $this->lezioni = getLezioniMateriaTitolo($this->row["titolo"]);
    }

  }

?>
