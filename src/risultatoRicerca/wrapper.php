<div id="wrapper">

  <?php $title="home" ?>
  <?php include '../wrapper_head.php' ?>

  <div id="content-wrapper">
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../filtra/">Lezioni</a>
        </li>
        <li class="breadcrumb-item">
          <a href="../ricercaAvanzata/">Ricerca avanzata</a>
        </li>
        <li class="breadcrumb-item active">Risultati</li>
      </ol>

      <?php $ricerca = $_POST['ricerca']; unset($_POST['ricerca']) ?>
      <?php
        $idMaterie = array();
        $idDocenti = array();

        foreach ($_POST as $key => $value) {
          if (startsWith($key, "materia_")){
            array_push($idMaterie, endInt($key));
          } else {
            array_push($idDocenti, endInt($key));
          }
        }
      ?>

      <?php
        print_r($idMaterie);
        print_r($idDocenti);
        print_r($ricerca);
      ?>

      <?php
        $queryMaterie = "(";
        foreach ($idMaterie as $idMateria) {
          $queryMaterie .= "materiedilezioni.idMateria=$idMateria OR ";
        }
        $queryMaterie .= "false)";

        $queryDocenti = "(";
        foreach ($idMaterie as $idMateria) {
          $queryDocenti .= "lezioni.idUtente=$idMateria OR ";
        }
        $queryDocenti .= "false)";


        if ($idMaterie && $idDocenti && $ricerca){
            $lezioni = query("SELECT lezioni.* FROM lezioni, materiedilezioni
              WHERE lezioni.id=materiedilezioni.idLezione AND
              $queryMaterie AND $queryDocenti");
        }

       ?>

       <?php// print_r($lezioni) ?>

    </div>
  </div>
</div>
