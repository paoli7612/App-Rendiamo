<?php include 'errori.php' ?>
<div class="w3-panel w3-half w3-display-middle">
  <form method="post">
    <div class="w3-card-4 w3-panel w3-blue">
      <h1 class="w3-center">Accedi</h1>
      <div class="w3-panel">
        <div class="w3-row w3-section">
          <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
          <div class="w3-rest">
            <input class="w3-input w3-card-4" type="email" name="email" placeholder="Email">
          </div>
        </div>
        <div class="w3-row w3-section">
          <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-key"></i></div>
          <div class="w3-rest">
            <input class="w3-input w3-card-4" type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="w3-left">
          <a href="../passwordDimenticata/">
            Password dimenticata
          </a>
        </div>
        <div class="w3-left">
          &nbsp;&nbsp;
          <a href="../registrati/">
            Registrati
          </a>
        </div>
        <div class=" w3-right">
          <button type="submit" class="w3-white"> Accedi </button>
        </div>
      </div>
    </div>
  </form>
</div>
