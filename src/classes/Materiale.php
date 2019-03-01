<?php

  class Materiale {
    public $id;
    public $nome;
    public $tipo;
    public $path;

    public function __construct($row){
      $this->id = $row['id'];
      $this->nome = $row['nome'];
      $this->tipo = $row['tipo'];
      $this->path = $row['path'];
    }

  }

?>
