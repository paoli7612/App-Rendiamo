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
      <div class="col-xl-4 col-md-6 col-sm-12">
        <button class="btn btn-block bg-<?php echo $tipo['colore']?> <?php if ($tipo['colore'] != 'light') echo 'text-white' ?> w-100 p-2">
          <div class="row">
            <div class="col-8">
              <h4 class="float-left">
                <?php echo $materiale['titolo'] ?>
              </h4>
            </div>
            <h1 class="col-4">
              <i class="fas fa-download float-right"></i>
            </h1>
          </div>
        </button>
      </div>
    <?php endforeach; ?>

  </div>
</div>
