<?php

  class Lezione {
    public $id;
    public $idUtente;
    public $titolo;
    public $contenuto;
    public $data;
    public $materia;
    public $anno;

    public function __construct($row){
      $this->id = $row['id'];
      $this->idUtente = $row['idUtente'];
      $this->titolo = $row['titolo'];
      $this->contenuto = $row['contenuto'];
      $this->data = $row['data'];
      $this->materia = $row['materia'];
      $this->anno = $row['anno'];
    }

  }

?>
