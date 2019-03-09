<?php

  class Utente {
    public $row;
    public $id;

    public $tema;
    public $avatar;

    public function __construct($row){
      $this->row = $row;
      $this->id = $row['id'];
    }

    public function loadTema(){
      $this->tema = getTemaId($this->row["idTema"]);
    }

    public function loadAvatar(){
      $this->avatar = getAvatarId($this->row["idAvatar"]);
    }

  }

?>
