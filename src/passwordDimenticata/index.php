<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Password dimenticata </title>
  </head>
  <body>
    <?php if (isset($_GET['email'])): ?>
    <?php else: ?>
      <div class="w3-panel w3-theme w3-half w3-display-topmiddle w3-card-4">
        <div class="w3-panel">
          <h1>Recupera Password</h1>
          <form method="get">
            <div class="w3-panel">
              <input type="text" name="email" class="w3-input w3-card-4">
            </div>
            <div class="w3-panel w3-right">
              <input type="button" name="email" class="w3-button w3-white w3-card-4" value="Conferma">
            </div>
          </form>
        </div>
      </div>
      </form>
    <?php endif; ?>
  </body>
</html>
