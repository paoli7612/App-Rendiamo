<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Password dimenticata </title>
  </head>
  <body>
    <?php if (isset($_GET['email'])): ?>
    <?php else: ?>
      <div class="w3-panel w3-blue w3-half w3-display-topmiddle w3-card-4">
        <div class="w3-panel">
          <h1>Recupera Password</h1>
          <form method="get">
            <div class="w3-panel">
              <input type="text" name="email" class="w3-input w3-card-4">
            </div>
            <div class="w3-panel w3-right">
              <input type="button" class="w3-button w3-white w3-card-4" value="Annulla" onclick="window.location='../login'">
              <input type="button"  class="w3-button w3-white w3-card-4" value="Conferma" disabled="disabled">
            </div>
          </form>
        </div>
      </div>
    <?php endif; ?>
  </body>
</html>
