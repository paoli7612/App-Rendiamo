<div id="wrapper">
  <?php include '../wrapper_head.php' ?>
  <div id="content-wrapper">
    <div class="container-fluid">
		<?php if($_GET['k'] == 'lezione'): ?>
			<div class="card col-5 border-white" style="margin:auto;">
			    <div align="center">
					<img style="width:50%;" src="../img/danger.png" class="card-img-top" alt="danger">
					<br/>
					<div class="card-body">
						<h3 class="class-title">ATTENZIONE !</h3>
						<h5>La lezione che hai ricercato non esiste o è stata rimossa</h5>
						<br/>
						<a href="../home" class="btn btn-danger">Torna alla Home</a>
					</div>
				</div>
			</div>
		<?php endif;?>
    </div>
  </div>
</div>