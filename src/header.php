
<?php
  include "../query/database.php";
  session_start();
  if ($_SESSION['login']){
    $utente = new Utente($_SESSION['utente']);
  } else {
    header('Location: /App-Rendiamo/src/');
  }
?>

<head>
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-<?php echo $utente->tema ?>.css">
</head>

<div class="w3-large w3-theme-l5">
<div class="w3-bar w3-card-4">
	<a href="/App-Rendiamo/src/home/">
		<button class="w3-bar-item w3-button w3-theme-l2">
			Home
		</button>
	</a>
	<a href="/App-Rendiamo/src/account/">
		<button class="w3-bar-item w3-button w3-theme-l3">
			Account
		</button>
	</a>
	<a href="/App-Rendiamo/src/lezioni/">
		<button class="w3-bar-item w3-button w3-theme-l4">
			Lezioni
		</button>
	</a>
	<?php if ($utente->tipo == 'admin'): ?>
	  <a href="/App-Rendiamo/src/utenti/">
		<button class="w3-bar-item w3-button w3-theme-l6">
		Utenti
		</button>
	  </a>
	<?php endif; ?>

</div>
</div>