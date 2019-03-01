
<?php
  include "../query/database.php";
  session_start();
  if ($_SESSION['login']){
    $utente = new Utente($_SESSION['utente']);
  } else {
    header('Location: /App-Rendiamo/src/');
  }
  include 'permit.php';
?>
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-<?php echo $utente->tema ?>.css">

<div class="w3-xlarge" id="header">
  <div class="w3-bar w3-card-4 w3-theme-l5">
  	<a href="/App-Rendiamo/src/home/" on>
  		<button class="w3-bar-item w3-button w3-theme-l2">
        <i class="fas fa-home"></i>
  		</button>
  	</a>
  	<a href="/App-Rendiamo/src/account/" on>
  		<button class="w3-bar-item w3-button w3-theme-l3">
        <i class="fas fa-user"></i>
  		</button>
  	</a>
  	<a href="/App-Rendiamo/src/lezioni/" on>
  		<button class="w3-bar-item w3-button w3-theme-l4">
        <i class="fas fa-book"></i>
  		</button>
  	</a>
  </div>
</div>
