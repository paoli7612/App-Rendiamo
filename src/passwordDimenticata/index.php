<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Password dimenticata </title>
  </head>
  <body>
    <?php if (isset($_GET['email'])): ?>
    <?php else: ?>
      <div class="w3-panel w3-theme">
        <div class="w3-panel">
          <form method="get">
            <input type="text" name="email" class="w3-input w3-card-4">
            <input type="button" name="email" class="w3-input w3-card-4">
          </form>
        </div>
      </div>
      </form>
    <?php endif; ?>
  </body>
</html>
