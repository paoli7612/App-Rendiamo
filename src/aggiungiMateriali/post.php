<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    print_r($_FILES);
    print_r($_POST);

    $idLezione = $_GET['id'];
    echo "<br>";

    //header("Location: ../lezione/?id=".$_GET['id']);
  }

?>





<!--

foreach ($_FILES as $file => $a) {
  if ($_FILES[$file]["size"] > 500000) {
    echo $_FILES[$file]["name"]." Dimensione eccessiva";
  } else {
    $path = "../../files/".$_UTENTE->row['email'];
    if (!file_exists($path)) {
      mkdir($path);
    }
    $target_file = $path."/".$_FILES[$file]["name"];
    move_uploaded_file($_FILES[$file]["tmp_name"], $target_file);
    $titolo = substr($_FILES[$file]["name"], 0, -4);
    $indirizzo = $_UTENTE->row['email']."/".$titolo;
    $tipo = substr($_FILES[$file]['name'], -3);
    newMateriale($indirizzo, $titolo, $tipo);
    $materiale = getMaterialeIndirizzo($indirizzo)[0];
    newMaterialeDiLezione($idLezione, $materiale->id);
  }
}


-->
