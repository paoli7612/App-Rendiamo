<?php

  class Utente {
    public $id;
    public $email;
    public $password;
    public $nome;
    public $cognome;
    public $domandaSicurezza;
    public $rispostaSicurezza;
    public $anno;
    public $tipo;
    public $avatar;

    public function __construct($row){
      $this->id = $row['id'];
      $this->email = $row['email'];
      $this->password = $row['password'];
      $this->nome = $row['nome'];
      $this->cognome = $row['cognome'];
      $this->domandaSicurezza = $row['domandaSicurezza'];
      $this->rispostaSicurezza = $row['rispostaSicurezza'];
      $this->anno = $row['anno'];
      $this->tipo = $row['tipo'];
      $this->avatar = $row['avatar'];
    }

  }

?>
