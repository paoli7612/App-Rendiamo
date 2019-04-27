<div class="container-fluid">
  <form method="post" enctype="multipart/form-data">
    <input id="in_file" type="file" style="display: none" onchange="selezionaFile(this)" name="in_file">


    <div class="row">
      <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="form-group">
          <div class="form-label-group">
            <button type="button" class="btn btn-secondary btn-block" onclick="document.getElementById('in_file').click()">Seleziona file</button>
          </div>
        </div>
      </div>

      <?php $tipi = query("SELECT * FROM tipiMateriali"); ?>
      <?php foreach ($tipi as $tipo): ?>
        <div class="col-xl-3 col-md-3 col-sm-6 mb-3 tipo" style="display: none">
          <button style="height: 100%" type="button" class="btn bg-<?php echo $tipo['colore'] ?> btn-block text-white" onclick="selezionaTipo(this, <?php echo $tipo['id'] ?>)">
            <i class="<?php echo $tipo['icona'] ?> fa-lg"></i>
          </button>
        </div>
      <?php endforeach; ?>
      <script type="text/javascript">
        document.getElementsByClassName('tipo')[0].style['display'] = '';
      </script>
      <div class="col">
        <div class="form-group">
          <div class="form-label-group">
            <input name="titolo" type="text" id="titolo" class="form-control" placeholder="Titolo" disabled="disabled" equired="required">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
    </div>





    <div class="form-group">
      <div class="form-label-group">
        <button type="submit" class="btn btn-block btn-secondary" id="submit" disabled>Carica</button>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript" src="script.js"></script>
