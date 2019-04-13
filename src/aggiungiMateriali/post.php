<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	print_r($_FILES);
    $idLezione = $_GET['id'];
	$n = 1;
	print_r($_POST);
	foreach ($_FILES as $file => $a) {
	  if ($_FILES[$file]["size"] > 500000) {
		echo $_FILES[$file]["name"]." Dimensione eccessiva";
	  } else {
		$path = "../../files/".$_SESSION['user_row']['email'];
		if (!file_exists($path)) {
		  mkdir($path);
		}
		$target_file = $path."/".$_FILES[$file]["name"];
		move_uploaded_file($_FILES[$file]["tmp_name"], $target_file);
		$titolo = $_POST['input_'.$n];
		$indirizzo = $_SESSION['user_row']['email']."/".$_FILES[$file]["name"];
		$estensione = substr($_FILES[$file]['name'], -3);
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


    //header("Location: ../lezione/?id=".$_GET['id']);
  }

?>
