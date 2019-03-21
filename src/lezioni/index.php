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


  <?php
    $m = isset($_GET['materia']) && ($_GET['materia']);
    $u = isset($_GET['utente']) && ($_GET['utente']);
    $r = isset($_GET['ricerca']) && ($_GET['ricerca']);
    include 'selezionaRicerca.php';
    include 'selezionaMateria.php';
    include 'selezionaUtente.php';
  ?>
    <?php


      if ($m && $r) {
        $lezioni = getLezioniIdMateriaRicerca($_GET['materia'], $_GET['ricerca']);
      } elseif ($u && $r){
        $lezioni = getLezioniIdUtenteRicerca($_GET['utente'], $_GET['ricerca']);
      } elseif ($m && $u){
        $lezioni = getLezioniIdUtenteIdMateria($_GET['materia'], $_GET['utente']);
      } elseif($m){
        $lezioni = getLezioniIdMateria($_GET['materia']);
      } elseif($u){
        $lezioni = getLezioniIdUtente($_GET['utente']);
      } elseif($r){
        $lezioni = getLezioniRicerca($_GET['ricerca']);
      } else {
        $lezioni = getLezioniLimit(100);
      }

      include 'tabella.php';
    ?>
    <script type="text/javascript" src="script.js">

    </script>
  </body>
</html>
