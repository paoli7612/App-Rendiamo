<div class="container-fluid">



  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="../lezione/?id=<?php echo $lezione['id'] ?>"><?php echo $lezione['titolo'] ?></a>
    </li>
    <li class="breadcrumb-item">
      <?php echo $tipo['plurale'] ?>
    </li>
  </ol>


  <div class="row">
    <?php foreach ($materiali as $materiale): ?>
      <div class="col-xl-4 col-md-6 col-sm-12 mb-3">
        <div class="card bg-<?php echo $tipo['colore']?> <?php if ($tipo['colore'] != 'light') echo 'text-white' ?>">
          <div class="card-header">
            <?php echo $materiale['titolo'] ?>
            <a class="float-right">
              <i class="<?php echo $tipo['icona'] ?>"></i>
            </a>
          </div>
          <div class="card-body">
            <h5>
              <b> Dimensione: </b> <?php echo $materiale['dimensione'] ?> Byte
            </h5>
            <h5>
              <b> Data di caricamento: </b> <?php echo $materiale['data'] ?>
            </h5>
          </div>
          <div class="card-footer">
            <a href="../../files/<?php echo $materiale['id'] ?>/<?php echo $materiale['titolo'] ?>" download id="materiale_<?php echo $materiale['id']?>">
            </a>
            <button class="btn btn-light" onclick="document.getElementById('materiale_<?php echo $materiale['id']?>').click()">
              <i class="fas fa-download"></i>
              Scarica</button>
            <?php if ($_SESSION['user_row']['id'] == $lezione['idUtente']): ?>
              <button class="btn btn-light" onclick="window.location='../eliminaMateriale/?id=<?php echo $materiale['id'] ?>'">
                <i class="fas fa-trash"></i>
                Elimina</button>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>
