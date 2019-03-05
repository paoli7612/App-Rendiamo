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
      <option value=""><?php echo $_SESSION['utente']['tema'] ?></option>
      <option value="green">green</option>
      <option value="light-green">light-green</option>
      <option value="blue">blue</option>
      <option value="light-blue">light-blue</option>
      <option value="red">red</option>
      <option value="pink">pink</option>
      <option value="purple">purple</option>
      <option value="w3schools">w3schools</option>
    </select>
  </div>
  <input type="submit" id="submit" style="display: none">
</form>
