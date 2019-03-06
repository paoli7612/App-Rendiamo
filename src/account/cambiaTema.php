<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  print_r($utente);
  $_SESSION['utente']['tema'] = $_POST['tema'];
  header('Location: ../account');
}
?>
<script>
var confirm = function(){
  document.getElementById('submit').click();
}
</script>
<form method="post">
  <div class="w3-left">
    <select class="w3-input" name="tema" onchange="confirm()">
      <option value="green">Verde</option>
      <option value="light-green">Verde chiaro</option>
      <option value="blue">Blu</option>
      <option value="light-blue">Azzurro</option>
      <option value="red">Rosso</option>
      <option value="w3schools">Lime</option>
      <option value="black">Nero</option>
      <option value="amber">Ambra</option>
    </select>
  </div>
  <input type="submit" id="submit" style="display: none">
</form>
