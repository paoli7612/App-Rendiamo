<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Login </title>
  </head>
  <body>
    <?php
      session_start();
      session_destroy();
      include "form.html";
      include "form.php";
    ?>
  </body>
</html>
