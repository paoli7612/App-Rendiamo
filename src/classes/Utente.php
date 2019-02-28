<?php

  class Utente {
    public $id;
    public $email;
    public $password;
    public $nome;
    public $cognome;
    public $domandaSicurezza;
    public $rispostaSicurezza;
    public $tipo;
    public $avatar;
	public $tema;

    public $row;

    public function __construct($row){
      $this->id = $row['id'];
      $this->email = $row['email'];
      $this->password = $row['password'];
      $this->nome = $row['nome'];
      $this->cognome = $row['cognome'];
      $this->domandaSicurezza = $row['domandaSicurezza'];
      $this->rispostaSicurezza = $row['rispostaSicurezza'];
      $this->tipo = $row['tipo'];
      $this->avatar = $row['avatar'];
	  $this->tema = $row['tema'];

      $this->row = $row;
    }

  }

?>
