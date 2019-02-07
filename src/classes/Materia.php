<?php

  class Materia {
    public $id;
    public $titolo;

    public function __construct($row){
      $this->id = $row['id'];
      $this->titolo = $row['titolo'];
    }

  }

?>
