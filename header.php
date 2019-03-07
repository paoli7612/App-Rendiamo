<?php ob_start(); ?>

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
<?php $n=0 ?>
<div class="w3-xlarge" id="header">
  <div class="w3-bar w3-card-4 w3-theme-l4">
  	<a href="/App-Rendiamo/src/home/">
  		<button class="w3-bar-item w3-button w3-theme-l<?php echo ++$n?>">
        <div class="w3-left <?php if($utente->tema!='black') echo 'w3-text-black'?>">
          <i class="fas fa-home"></i>
        </div>
        <div class="w3-right w3-hide-small <?php if($utente->tema!='black') echo 'w3-text-black'?>">
          &nbsp;Home
        </div>
  		</button>
  	</a>
    <a href="/App-Rendiamo/src/lezioni/">
      <button class="w3-bar-item w3-button w3-theme-l<?php echo ++$n?>">
        <div class="w3-left">
          <i class="fas fa-book"></i>
        </div>
        <div class="w3-right w3-hide-small">
          &nbsp;Lezioni
        </div>
      </button>
    </a>
  	<a href="/App-Rendiamo/src/account/">
  		<button class="w3-bar-item w3-button w3-theme-l<?php echo ++$n?>">
        <div class="w3-left">
          <i class="fas fa-user"></i>
        </div>
        <div class="w3-right w3-hide-small">
          &nbsp;Account
        </div>
  		</button>
  	</a>
    <?php if ($utente->tipo == 'admin'): ?>
      <a href="/App-Rendiamo/src/pannelloDiControllo/">
    		<button class="w3-bar-item w3-right w3-button w3-theme-l<?php echo $n?>">
          <div class="w3-left">
            <i class="fas fa-circle-notch"></i>
          </div>
          <div class="w3-right w3-hide-small">
            &nbsp;Admin
          </div>
    		</button>
    	</a>
    <?php endif; ?>
  </div>
</div>
