<?php

  class Lezione {
    public $id;
    public $idUtente;
    public $titolo;
    public $data;

    public $materie;

    public function __construct($row){
      $this->id = $row['id'];
      $this->idUtente = $row['idUtente'];
      $this->titolo = $row['titolo'];
      $this->data = $row['data'];

      $this->materie = getMaterieIdLezione($this->id);
    }

  }

?>
