<!DOCTYPE html>
<html>
  <head>
    <?php include '../_head/link.php'; ?>
    <title>Error</title>
  </head>
  <body>
    <?php include '../_database/connection.php' ?>

    <div class="w3-panel">
      <div class="w3-panel w3-blue w3-card-4">
        <h1>Ops!</h1>
        <div class="w3-panel">
          <p><?php if ($_GET['errore']=="permesso") {
			         echo "Qualcosa è andato storto! É possibile che tu non abbia i permessi per raggiungere questa pagina."
				   }
				   elseif ($_GET['errore']=="pagina") {
			         echo "Qualcosa è andato storto! La pagina che stai cercando di raggiungere non esiste."
				   }
				   elseif ($_GET['errore']=="richiesta") {
			         echo "Qualcosa è andato storto! La richiesta da te eseguita non è possibile da effettuare."
				   }
			?>
		  </p>
          <button class="w3-card-3 w3-white" onclick="window.location='../home/'"> Ritorna alla Home </button>
        </div>
      </div>
    </div>
  </body>
</html>
