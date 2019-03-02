<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    print_r($_FILES);

    $idLezione = $_GET['id'];
    echo "<br>";
    foreach ($_FILES as $file => $a) {
      if ($_FILES[$file]["size"] > 500000) {
        echo $_FILES[$file]["name"]." Dimensione eccessiva";
      } else {
        $path = "../../files/".$utente->email;
        if (!file_exists($path)) {
            mkdir($path);
        }
        $target_file = $path."/".$_FILES[$file]["name"];
        move_uploaded_file($_FILES[$file]["tmp_name"], $target_file);
        $indirizzo = $utente->email."/".$_FILES[$file]["name"];
        newMateriale($indirizzo);
        $materiale = getMaterialeIndirizzo($indirizzo)[0];
        newMaterialeDiLezione($materiale->id, $idLezione);
      }
    }

    //header("Location: ../lezioni/?id=".$_GET['id']);
  }

?>
