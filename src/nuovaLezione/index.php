<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Nuova Lezione </title>
  </head>
  <body>
    <?php include "../header.php"; ?>

    <form method="post">
      <input type="text" name="titolo" placeholder="titolo" required="required">

      <input type="button" value="aggiungiMateriale" onclick="alert('funzione non ancora disponibile')">

      <p>Documenti inseriti: (0)</p>

      <button type="submit" name="button">Crea</button>
    </form>

  </body>
</html>
