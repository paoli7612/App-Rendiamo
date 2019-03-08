<?php ob_start(); ?>

<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-amber.css">
<div class="w3-xlarge" id="header">
  <div class=" w3-card-4 w3-theme-l3">
	   <button class="w3-button w3-theme-l2" onclick="window.location='../home'">
      <div class="w3-left">
        <i class="fas fa-home"></i>
      </div>
      <div class="w3-right w3-hide-small">
        &nbsp;Home
      </div>
		</button>
    <button class="w3-button w3-theme-l2" onclick="window.location='../lezioni'">
      <div class="w3-left">
        <i class="fas fa-book"></i>
      </div>
      <div class="w3-right w3-hide-small">
        &nbsp;Lezioni
      </div>
    </button>
		<button class="w3-button w3-theme-l2" onclick="window.location='../account'">
      <div class="w3-left">
        <i class="fas fa-user"></i>
      </div>
      <div class="w3-right w3-hide-small">
        &nbsp;Account
      </div>
		</button>
		<button class="w3-right w3-button w3-theme-l2" disabled="disabled">
      <div class="w3-left">
        <i class="fas fa-circle-notch"></i>
      </div>
      <div class="w3-right w3-hide-small">
        &nbsp;Admin
      </div>
		</button>
  </div>
</div>
