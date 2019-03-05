
<div class="w3-panel">
	<div class="w3-third">
	  <img src="/App-Rendiamo/files/avatar/3.png" class="w3-card-4 w3-grayscale-max" alt="Avatar" style="width:100%;opacity:0.85">
	</div>
	<div class="w3-rest w3-panel">
		<div class="w3-panel">
			<h1>
				<?php echo $utente->nome ?>
				<?php echo $utente->cognome ?>
			</h1>
		</div>
		<div class="w3-panel w3-theme-l2 w3-card-4">
			<h3 class="w3-left">Cambia Tema</h3>
      <div class="w3-panel w3-right">
				<?php include "cambiaTema.php"; ?>
      </div>
    </div>
		<div class="w3-panel w3-theme-l2 w3-card-4">
			<h3 class="w3-left">Visualizza le mie lezioni</h3>
      <div class="w3-panel w3-right">
				<a href="../logout.php">
					<button class="w3-button w3-white">Visualizza</button>
				</a>
      </div>
    </div>
		<div class="w3-panel w3-theme-l2 w3-card-4">
			<h3 class="w3-left">Disconnetti</h3>
			<div class="w3-panel w3-right">
				<a href="../logout.php">
					<button class="w3-button w3-white">Disconnetti</button>
				</a>
			</div>
		</div>
		<div class="w3-panel w3-theme-l2 w3-card-4">
			<h3 class="w3-left">Cambia Password</h3>
			<div class="w3-panel w3-right">
				<a href="../logout.php">
					<button class="w3-button w3-white" disabled="disabled">Cambia Password</button>
				</a>
			</div>
		</div>
	</div>
</div>
