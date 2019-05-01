<?php $tipi = query("SELECT DISTINCT tipiMateriali.*
                    FROM tipiMateriali, materiali
                    WHERE materiali.idTipo=tipiMateriali.id
                      AND materiali.idLezione=".$lezione['id']." ORDER BY titolo")?>


<div class="row mt-3">
  <?php foreach ($tipi as $tipo): ?>
    <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
      <button class="btn btn-block bg-<?php echo $tipo['colore']?> <?php if ($tipo['colore'] != 'light') echo 'text-white' ?> w-100 p-3" style="height: 100%" onclick="window.location='../materiali/?id=<?php echo $lezione['id'] ?>&tipo=<?php echo $tipo['id'] ?>'">
        <div class="row">
          <div class="col-8">
            <h4 class="float-left">
              <?php echo $tipo['plurale'] ?>
            </h4>
          </div>
          <h1 class="col-4">
            <i class="<?php echo $tipo['icona'] ?> float-right"></i>
          </h1>
        </div>
      </button>
    </div>
  <?php endforeach; ?>
</div>
