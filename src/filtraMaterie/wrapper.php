<div id="wrapper">

  <?php $title ="lezioni" ?>
  <?php include '../wrapper_head.php' ?>
  <?php
      $materie = query("SELECT materie.*, count(materieDiLezioni.id) AS count FROM materie, materieDiLezioni WHERE materie.id=materieDiLezioni.idMateria GROUP BY materie.id");
  ?>

  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../filtra/">Lezioni</a>
        </li>
        <li class="breadcrumb-item">
          Ricerca per materie
        </li>
        </ol>
      <div class="row">
		<?php foreach ($materie as $materia): ?>
			<div class="col-xl-6 col-sm-6 mb-3" onclick="window.location='../lezioni/?materia=<?php echo $materia['id'] ?>'">
			  <div class="card text-white o-hidden h-100 onmouseover bg-secondary" onmouseover="hover(this)" onmouseleave="leave(this)">
				<div class="card-body">
				  <div class="card-body-icon">
					<i class="fas fa-layer-group"></i>
				  </div>
				  <div class="mr-5"><?php echo $materia['titolo']; ?></div>
				</div>
				<a class="card-footer text-white clearfix small z-1">
				  <span class="float-left">Visualizza le <?php echo $materia['count'] ?> lezioni</span>
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
