<div class="container">
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <div class="form-label-group">
        <button type="button" class="btn btn-secondary btn-block" onclick="document.getElementById('in_file').click()">Aggiungi materiale</button>
        <input id="in_file" type="file" style="display: none" onchange="inputFile()">
      </div>
    </div>
    <div id="files">
    </div>
    <div class="form-group">
      <div class="form-label-group">
        <button type="submit" class="btn btn-block btn-secondary" disabled id="submit">Carica</button>
      </div>
    </div>
  </form>
</div>

<div class="modal fade" id="modalTipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <?php $tipiMateriali = query("SELECT * FROM tipiMateriali") ?>
        <?php foreach ($tipiMateriali as $tipo): ?>
          <button class="btn btn-block" onclick="impostaTipo('<?php echo $tipo['titolo'] ?>', 'bg-<?php echo $tipo['colore']?>', <?php echo $tipo['id'] ?>)">
            <div class="card text-white bg-<?php echo $tipo['colore']?> o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa-fw <?php echo $tipo['icona'] ?>"></i>
                </div>
                <div class="mr-5"><?php echo $tipo['titolo'] ?></div>
              </div>
            </div>
          </button>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="script.js"></script>
