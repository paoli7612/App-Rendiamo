<div class="container-fluid">


  <?php
    $idTipo = $_GET['tipo'];
    $idLezione = $_GET['id'];
    $lezione = query("SELECT *
                      FROM lezioni
                      WHERE id=$idLezione")[0];
    $tipo = query("SELECT *
                  FROM tipiMateriali
                  WHERE id=$idTipo")[0];
    $materiali = query("SELECT *
                        FROM materiali
                        WHERE idTipo=$idTipo
                          AND idLezione=$idLezione") ?>

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
              <b> Dimensione: </b> <?php echo $materiale['dimensione'] ?>
            </h5>
            <h5>
              <b> Data: </b> <?php echo $materiale['data'] ?>
            </h5>
          </div>
          <div class="card-footer">
            <a href="../../files/<?php echo $materiale['id'] ?>/<?php echo $materiale['titolo'] ?>" download="download">
              <button class="btn btn-light">
                <i class="fas fa-download"></i>
                Scarica</button>
            </a>
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
