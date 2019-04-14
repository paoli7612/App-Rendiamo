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
        //print_r($idMaterie);        print_r($idDocenti);        print_r($ricerca);
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

       <?php
        if ($idDocenti){
          $queryDocenti = "(";
          foreach ($idDocenti as $idDocente) {
            $queryDocenti .= "utenti.id=$idDocente OR ";
          }
          $queryDocenti .= "false)";
          $docenti = query("SELECT * FROM utenti WHERE $queryDocenti");
        }

        if ($idMaterie){
          $queryMaterie = "(";
          foreach ($idMaterie as $idMateria) {
            $queryMaterie .= "materie.id=$idMateria OR ";
          }
          $queryMaterie .= "false)";
          $materie = query("SELECT * FROM materie WHERE $queryMaterie");
        }

       ?>

       <br>
       <?php if (isset($docenti)): ?>
         <b>Docenti selezionati:</b>
         <br>
         <?php foreach ($docenti as $docente): ?>
           <?php echo $docente['cognome']." ".$docente['nome'] ?>
           <br>
         <?php endforeach; ?>
       <?php endif; ?>

       <br>
       <?php if (isset($materie)): ?>
         <b>Materie selezionate:</b>
         <br>
         <?php foreach ($materie as $materia): ?>
           <?php echo $materia['titolo'] ?>
           <br>
         <?php endforeach; ?>
       <?php endif; ?>


       <?php if ($ricerca): ?>
         <br>
         <b>Testo cercato:</b>
         <br>
         <?php echo $ricerca ?>
       <?php endif; ?>

    </div>
  </div>
</div>
