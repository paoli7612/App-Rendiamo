
<div class="w3-panel">
  <form method="post" enctype="multipart/form-data">
    <div class="w3-panel w3-left">
      <button onclick="plus()" id="add" type="button" class="w3-blue w3-circle w3-card-4">+</button>
      <input id="input" onchange="newFile()" type="file" style="display: none">
    </div>
    <div class="w3-panel w3-right">
      <button type="submit" id="submit" disabled="disabled" class="w3-blue w3-card-4">Carica</button>
    </div>
    <div class="w3-panel" id="files">

    </div>
  </form>
</div>
<script src="script.js"></script>
