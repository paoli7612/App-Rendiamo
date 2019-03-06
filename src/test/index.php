<!DOCTYPE html>
<html>
  <head>
    <?php include "../head.html"; ?>
    <title> Home </title>
  </head>
  <body>
    <?php include "../header.php"; ?>
    <?php permitAdmin($utente); ?>

    <form method="post">
      <div class="w3-panel w3-half">
        <h4>SQL</h4>
        <div class="w3-panel w3-theme-l2 w3-card-4">
          <div class="w3-panel">
            <button type="submit" class="w3-button w3-white w3-right ">Avvia</button>
            <div class="w3-rest">
              <input type="text" class="w3-input w3-card-4" name="query">
            </div>
          </div>
        </div>
      </div>
    </form>


    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>

      <?php
        $conn = new mysqli("localhost", "root", "", "lele");
        $tabella = array();
        $result = $conn->query($_POST['query']);
        if ($result){
          if ($result->num_rows == 0) {
            echo "no result";
          } else while($row = $result->fetch_assoc()){
            array_push($tabella, $row);
          }
        }
        $conn->close();
      ?>

      <div class="w3-panel">
        <table class="w3-table w3-table-all w3-card-4">
          <tr>
            <?php foreach ($tabella[0] as $key => $value): ?>
              <th>
                <?php echo $key ?>
              </th>
            <?php endforeach; ?>
          </tr>
          <?php foreach ($tabella as $key => $value): ?>
          <tr>
              <?php foreach ($value as $key => $asd): ?>
                <td>
                  <?php print_r($asd); ?>
                </td>
              <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
        </table>
      </div>
    <?php endif; ?>

  </body>
</html>
