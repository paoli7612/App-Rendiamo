<?php

  class Utente {
    public $row;

    public $tema;
    public $avatar;

    public function __construct($row){
      $this->row = $row;
    }

    public function loadTema(){
      $this->tema = getTemaId($this->row["idTema"]);
    }

    public function loadAvatar(){
      $this->avatar = getAvatarId($this->row["idAvatar"]);
    }

  }

?>
