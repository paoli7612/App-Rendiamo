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
        foreach ($idDocenti as $idDocente) {
          $queryDocenti .= "lezioni.idUtente=$idDocente OR ";
        }
        $queryDocenti .= "false)";


        if ($idMaterie && $idDocenti && $ricerca){
          $lezioni = query("SELECT lezioni.*, utenti.nome, utenti.cognome FROM lezioni, materiedilezioni, utenti
            WHERE lezioni.id=materiedilezioni.idLezione AND utenti.id=lezioni.idUtente AND
            $queryMaterie AND $queryDocenti AND lezioni.titolo LIKE ('%$ricerca%')");
        } elseif ($idMaterie && $idDocenti){
          $lezioni = query("SELECT lezioni.*, utenti.nome, utenti.cognome FROM lezioni, materiedilezioni, utenti
            WHERE lezioni.id=materiedilezioni.idLezione AND utenti.id=lezioni.idUtente AND
            $queryMaterie AND $queryDocenti");
        } elseif ($idMaterie && $ricerca){
          $lezioni = query("SELECT lezioni.*, utenti.nome, utenti.cognome FROM lezioni, materiedilezioni, utenti
            WHERE lezioni.id=materiedilezioni.idLezione AND utenti.id=lezioni.idUtente AND
            $queryMaterie");
        } elseif ($idDocenti && $ricerca){
          $lezioni = query("SELECT lezioni.*, utenti.nome, utenti.cognome FROM lezioni, utenti
            WHERE utenti.id=lezioni.idUtente AND
            $queryDocenti");
        } elseif ($idMaterie){
          $lezioni = query("SELECT lezioni.*, utenti.nome, utenti.cognome FROM lezioni, materiedilezioni, utenti
            WHERE lezioni.id=materiedilezioni.idLezione AND utenti.id=lezioni.idUtente AND
            $queryMaterie");
        } elseif ($idDocenti) {
          $lezioni = query("SELECT lezioni.*, utenti.nome, utenti.cognome FROM lezioni, utenti
            WHERE utenti.id=lezioni.idUtente AND
            $queryDocenti");
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
       <div class="row">
         <div class="col-xl-4 col-sm-12 mb-3">
           <?php if (isset($docenti)): ?>
             <div class="card">
               <div class="card-header">
                 Docenti selezionati
                 <a class="float-right">
                   <i class="fas fa-users"></i>
                 </a>
               </div>
               <div class="card-body">
                 <?php foreach ($docenti as $docente): ?>
                   <?php echo $docente['cognome']." ".$docente['nome'] ?>
                   <br>
                 <?php endforeach; ?>
               </div>
             </div>
           <?php endif; ?>
         </div>
         <div class="col-xl-4 col-sm-12 mb-3">

           <?php if (isset($materie)): ?>
             <div class="card">
               <div class="card-header">
                 Materie selezionate
                 <a class="float-right">
                   <i class="fas fa-book"></i>
                 </a>
               </div>
               <div class="card-body">
                 <?php foreach ($materie as $materia): ?>
                   <?php echo $materia['titolo'] ?>
                   <br>
                 <?php endforeach; ?>
               </div>
             </div>
           <?php endif; ?>
         </div>
         <div class="col-xl-4 col-sm-12 mb-3">
           <?php if ($ricerca): ?>
             <div class="card">
               <div class="card-header">
                 Testo cercato
                 <a class="float-right">
                   <i class="fas fa-search"></i>
                 </a>
               </div>
               <div class="card-body">
                 <?php echo $ricerca ?>
               </div>
             </div>
           <?php endif; ?>
         </div>
       </div>
     <div class="row">
       <?php if ($lezioni): ?>
         <?php foreach ($lezioni as $lezione): ?>
           <div class="col-xl-6 col-sm-6 mb-3" onclick="window.location='../lezione/?id=<?php echo $lezione['id'] ?>'">
             <div class="card text-white bg-secondary o-hidden h-100" onmouseover="hover(this)" onmouseleave="leave(this)">
               <div class="card-body">
                 <div class="card-body-icon">
                   <i class="fas fa-fw fa-bars"></i>
                 </div>
                 <div class="mr-5"><?php echo $lezione['titolo'] ?></div>
               </div>
               <a class="card-footer text-white clearfix small z-1" href="../lezione/?id=<?php echo $lezione['id'] ?>">
                 <span class="float-left"><?php echo $lezione['nome']." ".$lezione['cognome'] ?></span>
                 <span class="float-right">
                   <i class="fas fa-user"></i>
                 </span>
               </a>
               <?php $materie = query("SELECT * FROM materie, materieDiLezioni WHERE materieDiLezioni.idLezione=".$lezione['id']." AND materie.id=materieDiLezioni.idMateria") ?>
               <a class="card-footer text-white clearfix small z-1" href="../lezione/?id=<?php echo $lezione['id'] ?>">
                 <span class="float-left">
                   <?php if ($materie): ?>
                     <?php foreach ($materie as $materia): ?>
                       <?php echo $materia['titolo'] ?>
                     <?php endforeach; ?>
                     <?php else: ?>
                       Nessuna materia
                   <?php endif; ?>
                 </span>
                 <span class="float-right">
                   <i class="fas fa-book"></i>
                 </span>
               </a>
             </div>
           </div>
         <?php endforeach; ?>
       <?php else: ?>
         Nessuna lezione trovata
       <?php endif; ?>
    </div>
  </div>
</div>
