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
