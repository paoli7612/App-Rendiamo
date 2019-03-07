<?php

  class Lezione {
    public $id;
    public $idUtente;
    public $titolo;
    public $data;
    public $note;

    public $row;
    public $materie;

    public function __construct($row){
      $this->id = $row['id'];
      $this->idUtente = $row['idUtente'];
      $this->titolo = $row['titolo'];
      $this->data = $row['data'];
      $this->note = $row['note'];

      $this->row = $row;

      $this->utente = getUtenteId($this->idUtente);
      $this->materie = getMaterieIdLezione($this->id);
    }

    public function getData($pattern){
      $data = DateTime::createFromFormat("Y-m-d H:i:s", $this->data);
      $return = $data->format($pattern);
      $return = str_replace("January", "Gennaio", $return);
      $return = str_replace("Februrary", "Febbraio", $return);
      $return = str_replace("March", "Marzo", $return);
      $return = str_replace("April", "Aprile", $return);
      $return = str_replace("May", "Maggio", $return);
      $return = str_replace("June", "Giunio", $return);
      $return = str_replace("July", "Luglio", $return);
      $return = str_replace("August", "Agosto", $return);
      $return = str_replace("September", "Settembre", $return);
      $return = str_replace("October", "Ottobre", $return);
      $return = str_replace("November", "Novembre", $return);
      $return = str_replace("December", "Dicembre", $return);

      $return = str_replace("Monday", "Lunedì", $return);
      $return = str_replace("Tuesday", "Martedì", $return);
      $return = str_replace("Wednesday", "Mercoledì", $return);
      $return = str_replace("Thursday", "Giovedì", $return);
      $return = str_replace("Friday", "Venerdì", $return);
      $return = str_replace("Saturday", "Sabato", $return);
      $return = str_replace("Sunday", "Domenica", $return);
      return $return;
    }

  }

?>
