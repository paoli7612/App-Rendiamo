<div id="wrapper">

  <?php $title ="materie" ?>
  <?php include '../wrapper_head.php' ?>
  <?php
      $materie = query("SELECT * FROM materie");
  ?>
  
  <div id="content-wrapper">
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a>Clicca la materia per visualizzare le lezioni.</a>
        </li>
      </ol>
      <div class="row">
		<?php foreach ($materie as $materia): ?>
			<div class="col-xl-6 col-sm-6 mb-3">
			  <div class="card text-white o-hidden h-100 onmouseover bg-secondary" onmouseover="hover(this)" onmouseleave="leave(this)">
				<div class="card-body">
				  <div class="card-body-icon">
					<i class="fas fa-layer-group"></i>
				  </div>
				  <div class="mr-5"><?php echo $materia['titolo']; ?></div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="../lezioni/?id=<?php echo $materia['id'] ?>">
				  <span class="float-left">Visualizza le lezioni</span>
				  <span class="float-right">
					<i class="fas fa-angle-right"></i>
				  </span>
				</a>
			  </div>
			</div>
		<?php endforeach; ?>
		<script>
			var hover = function(e){
				e.className = "card text-white o-hidden h-100 onmouseover bg-primary";
			}
			var leave = function(e){
				e.className = "card text-white o-hidden h-100 onmouseover bg-secondary";
			}
	
		</script>
      </div>
    </div>
  </div>
</div>
