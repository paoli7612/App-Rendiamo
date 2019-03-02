<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    print_r($_FILES);

    $idLezione = $_GET['id'];
    echo "<br>";
    foreach ($_FILES as $file => $a) {
      if ($_FILES[$file]["size"] > 500000) {
        echo $_FILES[$file]["name"]." Dimensione eccessiva";
      } else {
        $target_file = "../../files/".$_FILES[$file]["name"];
        move_uploaded_file($_FILES[$file]["tmp_name"], $target_file);
        header("Location: ../lezioni/?id=".$_GET['id']);
      }
    }

  }

?>
