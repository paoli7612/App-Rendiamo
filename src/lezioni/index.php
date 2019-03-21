<!DOCTYPE html>
<html>
  <head>
    <?php include '../_head/link.php'; ?>
    <title>Lezioni</title>
  </head>
  <body>
    <?php include '../_database/connection.php' ?>
    <?php include '../_session/start.php' ?>
    <?php include '../_head/bar.php' ?>

	<div class="w3-right">
		<div class="w3-panel">
			<button class="w3-button w3-blue w3-card-4 w3-round-xlarge" onclick="window.location='../nuovaLezione/'">
				Nuova Lezione
			</button>
		</div>
	</div>
	<div class="w3-right">
		<div class="w3-panel">
			<div class="w3-row">
				<input type="text" class="w3-col radius-left w3-threequarter w3-input">
				<button class="w3-col radius-right w3-blue w3-button w3-quarter">
					<i class="fas fa-search"></i>
				</button>
			</div>
		</div>
	</div>
	
    <?php
      include 'selezionaMateria.php';
      include 'selezionaUtente.php';

      $m = isset($_GET['materia']);
      $u = isset($_GET['utente']);

      if ($m && $u){
        $lezioni = getLezioniIdUtenteIdMateria($_GET['materia'], $_GET['utente']);
      } elseif($m){
        $lezioni = getLezioniIdMateria($_GET['materia']);
      } elseif($u){
        $lezioni = getLezioniIdUtente($_GET['utente']);
      } else {
        $lezioni = getLezioniLimit(100);
      }

      include 'tabella.php';
    ?>
  </body>
</html>
