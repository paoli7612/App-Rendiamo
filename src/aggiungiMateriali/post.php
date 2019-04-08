<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
	unset($_FILES['in_file']);
	print_r($_FILES);
    $idLezione = $_GET['id'];
	$n = 0;
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
		$titolo = substr($_FILES[$file]["name"], 0, -4);
		$indirizzo = $_SESSION['user_row']['email']."/".$titolo;
		$estensione = substr($_FILES[$file]['name'], -3);
		$tipo = $_POST[$n];
		query("INSERT INTO materiali (`indirizzo`,`titolo`,`esetensione`,`tipo`) VALUES
				('$titolo', '$indirizzo', '$estensione', '$tipo');");
		//newMateriale($indirizzo, $titolo, $tipo);
		//$materiale = getMaterialeIndirizzo($indirizzo)[0];
		//newMaterialeDiLezione($idLezione, $materiale->id);
		$n++;
	  }
	}
	

    //header("Location: ../lezione/?id=".$_GET['id']);
  }

?>
