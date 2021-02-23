<?php ob_start(); ?>


<?php

  function query($sql){
    $conn = new mysqli("localhost", "root", "", "appRendiamo");
    //print_r($conn);
    $tabella = array();
    $result = $conn->query($sql);
    //print_r($sql);
    //print_r($conn->error);
    if ($conn->error){
      return ($conn->error);
    }
    if (isset($result->num_rows)){
      if ($result->num_rows == 0) {
        return $tabella;
      } else while($row = $result->fetch_assoc()){
        array_push($tabella, $row);
      }
      $conn->close();
      return $tabella;
    } else {
      $conn->close();
    }
  }

	function is_admin(){
		if($_SESSION['user_row']['tipo'] != 'admin'){
			header('Location: ../home/');
		}
	}

	function is_docente(){
		if($_SESSION['user_row']['tipo'] == 'utente'){
			header('Location: ../home/');
		}
	}

	function lezione_docente($lezione){
		if($_SESSION['user_row']['id'] != $lezione['idUtente']){
			header('Location: ../home/');
		}
	}


  function startsWith($stringa, $chiave){
     $length = strlen($chiave);
     return (substr($stringa, 0, $length) === $chiave);
  }

  function endInt($stringa){
    return explode("_",$stringa)[1];
  }

  function endsWith($haystack, $needle){
    $length = strlen($needle);
    return (substr($haystack, -$length) === $needle);
  }

?>
