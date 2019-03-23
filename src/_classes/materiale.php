<?php

  class Materiale {
    public $row;

    public $id;
    public $utente;

    public function __construct($row){
      $this->row = $row;
      $this->id = $row['id'];
    }

  }

?>
