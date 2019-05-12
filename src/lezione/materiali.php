<?php $idLezione = $lezione['id'] ?>
<?php $tipi = query("SELECT tipiMateriali.*, COUNT(materiali.id) as count
        FROM tipiMateriali, materiali
        WHERE materiali.idTipo=tipiMateriali.id
        AND materiali.idLezione=$idLezione
        GROUP BY tipiMateriali.id
        ORDER BY titolo
") ?>


<div class="row mt-3">
  <?php if ($tipi): ?>
    <?php foreach ($tipi as $tipo): ?>
      <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
        <button class="btn btn-block bg-<?php echo $tipo['colore']?> <?php if ($tipo['colore'] != 'light') echo 'text-white' ?> w-100 p-3" style="height: 100%" onclick="window.location='../materiali/?id=<?php echo $lezione['id'] ?>&tipo=<?php echo $tipo['id'] ?>'">
          <div class="row">
            <div class="col-8">
              <h4 class="float-left">
                <?php echo $tipo['count'] ?>
                <?php if ($tipo['count'] == 1): ?>
                  <?php echo $tipo['titolo'] ?>
                <?php else: ?>
                  <?php echo $tipo['plurale'] ?>
                <?php endif; ?>
              </h4>
            </div>
            <h1 class="col-4">
              <i class="<?php echo $tipo['icona'] ?> float-right"></i>
            </h1>
          </div>
        </button>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="container">
      <div class="card bg-light card-body">
        <div class="row">
          <div class="col">
            <h3>Nessun materiale caricato</h3>
            <p>Il docente non ha ancora caricato materiali in questa lezione</p>
          </div>
          <div class="col">
            <h1 class="float-right">
              <i class="fas fa-exclamation-triangle"></i>
            </h1>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>
