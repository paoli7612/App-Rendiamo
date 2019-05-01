<div class="container-fluid">
  <form action="post.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idLezione" value="<?php echo $_GET['id'] ?>">
    <input id="in_file" type="file" style="display: none" onchange="selezionaFile(this)" name="in_file">

    <?php $tipi = query("SELECT * FROM tipiMateriali ORDER BY titolo"); ?>

    <div class="row">
      <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="form-group">
          <div class="form-label-group">
            <button type="button" class="btn btn-secondary btn-block" onclick="document.getElementById('in_file').click()">Seleziona file</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <div class="form-label-group">
            <input name="titolo" type="text" id="titolo" class="form-control" placeholder="Titolo" disabled="disabled" equired="required" onchange="controllaTitoloMateriale(this.value, <?php echo $_GET['id'] ?>)">
          </div>
        </div>
      </div>
    </div>
    <div id="error" style="display: none">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Attenzione!</strong> Hai gia usato questo titolo per un altro materiale di questa lezione.
      </div>
    </div>

    <div class="row">
      <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="form-group">
          <div class="form-label-group">
            <?php foreach ($tipi as $tipo): ?>
              <button type="button" class="tipo tipo-<?php echo $tipo['id'] ?> <?php if ($tipo['colore'] != 'light') echo 'text-white' ?> btn btn-block bg-<?php echo $tipo['colore']?>" onclick="$(#tipo).click()" style="display:none">
                <?php echo $tipo['titolo'] ?>
              </button>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <select class="form-control" name="tipo" disabled="disabled" id="tipo" onchange="selezionaTipo(this.selectedOptions[0].value)">
            <option disabled selected>Tipo</option>
            <?php foreach ($tipi as $tipo): ?>
              <option value="<?php echo $tipo['id'] ?>"><?php echo $tipo['titolo'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>





    <div class="form-group">
      <div class="form-label-group">
        <button type="submit" class="btn btn-block btn-secondary" id="submit" disabled>Carica</button>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript" src="script.js"></script>
