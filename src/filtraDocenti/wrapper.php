<div id="wrapper">

  <?php $title="lezioni" ?>
  <?php include '../wrapper_head.php' ?>
  <?php $docenti = query("SELECT utenti.*, COUNT(lezioni.id) as count FROM utenti, lezioni WHERE (tipo='professore' OR tipo='admin') AND lezioni.idUtente=utenti.id GROUP BY utenti.id") ?>

  <div id="content-wrapper">
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../filtra/">Lezioni</a>
        </li>
        <li class="breadcrumb-item">
          Docenti
        </li>
      </ol>
      <div class="row">
        <?php foreach ($docenti as $docente): ?>
        <div class="col-xl-6 col-sm-6 mb-3" onclick="window.location='../lezioni/?utente=<?php echo $docente['id'] ?>'">
  			  <div class="card text-white o-hidden h-100 onmouseover bg-secondary" onmouseover="hover(this)" onmouseleave="leave(this)">
    				<div class="card-body">
    				  <div class="card-body-icon">
                <?php if ($docente['tipo'] == 'admin'): ?>
                  <i class="fas fa-user-graduate"></i>
                <?php else: ?>
                  <i class="fas fa-user"></i>
                <?php endif; ?>
    				  </div>
    				  <div class="mr-5">
                <?php echo $docente['nome']. " " .$docente['cognome']?>
              </div>
    				</div>
    				<a class="card-footer text-white clearfix small z-1" href="../lezioni/?materia=<?php echo $docente['id'] ?>">
    				  <span class="float-left">
                <?php echo $docente['count'] ?> Lezioni
              </span>
    				  <span class="float-right">
    					       <i class="fas fa-angle-right"></i>
    				  </span>
  				    </a>
  			  </div>
  			</div>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
