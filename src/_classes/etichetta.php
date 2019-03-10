<?php

  class Etichetta {
    public $row;
    public $id;

    public $lezioni;

    public function __construct($row){
      $this->row = $row;
      $this->id = $row['id'];
    }

    public function loadLezioni(){
      $this->lezioni = getLezioniIdEtichetta($this->id);
    }

  }

?>
