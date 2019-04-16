<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $idLezione = $_GET['id'];
  	$n = 1;
  	foreach ($_FILES as $file) {
  	  if ($file["size"] > 500000) {
  		echo $file["name"]." Dimensione eccessiva";
  	  } else {
  		$path = "../../files/".$_SESSION['user_row']['email'];
  		if (!file_exists($path)) {
  		  mkdir($path);
  		}
  		$target_file = $path."/".$file["name"];
  		move_uploaded_file($file["tmp_name"], $target_file);
  		$titolo = $_POST['input_'.$n];
  		$indirizzo = $_SESSION['user_row']['email']."/".$file["name"];
  		$estensione = substr($file['name'], -3);
  		$tipo = $_POST['button_'.$n];
  		$a = query("INSERT INTO materiali (`titolo`,`indirizzo`,`estensione`,`tipo`) VALUES
  				('$titolo', '$indirizzo', '$estensione', '$tipo');");
      print_r($a);
      $idMateriale = query("SELECT * FROM materiali WHERE titolo='$titolo' AND indirizzo='$indirizzo';");
      if (count($idMateriale)){
        $idMateriale = $idMateriale[0]['id'];
        query("INSERT INTO materialidilezioni (`idMateriale`,`idLezione`) VALUES ($idMateriale, $idLezione)");
      } else {
        echo "ERRORE CON IL FILE $titolo";
      }

      $n++;
  	  }

  	}
    $n--;
    $notifica = "Caricati $n materiali!";
    $link = "../lezione/?id=$idLezione";
    query("INSERT INTO notifiche (`idUtente`, `testo`, `link`) VALUES ($idUtente, '$notifica', '$link')");


    header("Location: ../lezione/?id=".$_GET['id']);
  }

?>
