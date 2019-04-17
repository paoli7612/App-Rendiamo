<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    print_r($_POST);
    $idLezione = $_GET['id'];
  	$n = 1;
  	foreach ($_FILES as $file) {
  	  if ($file["size"] > 500000) {
  		echo $file["name"]." Dimensione eccessiva";
  	  } else {
    		$titolo = $_POST['input_'.$n];
        $estensione = pathinfo($file['name'], PATHINFO_EXTENSION);
    		$tipo = $_POST['tipo_'.$n];
    		query("INSERT INTO materiali (`titolo`,`estensione`,`idTipo`) VALUES
    				('$titolo', '$estensione', '$tipo');");
        $idMateriale = query("SELECT * FROM materiali WHERE titolo='$titolo';");
        if (count($idMateriale)){
          $idMateriale = $idMateriale[0]['id'];
          $path = "../../files/".$_SESSION['user_row']['email'];
          if (!file_exists($path)) {
            mkdir($path);
          }
          $target_file = $path."/".$idMateriale.".".$estensione;
          move_uploaded_file($file["tmp_name"], $target_file);
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
