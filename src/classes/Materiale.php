<?php

  class Materiale {
    public $id;
    public $indirizzo;
    public $titolo;

    public function __construct($row){
      $this->id = $row['id'];
      $this->indirizzo = $row['indirizzo'];
      $this->titolo = $row['titolo'];
    }

  }

?>
