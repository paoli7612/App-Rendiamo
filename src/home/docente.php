<div class="col-xl-6 col-md-12 col-sm-12 mb-3">
  <button class="btn btn-block bg-primary text-white w-100 p-5" style="height: 100%" onclick="window.location='../filtra'">
    <div class="row">
      <div class="col-8 float-left">
        <h3 class="row">
          Lezioni
        </h3>
        <p class="row text-left">
          Visualizza le lezioni messe a disposizione dai professori e i materiali caricati.
        </p>
      </div>
      <h1 class="col-4">
        <i class="fas fa-book float-right"></i>
      </h1>
    </div>
  </button>
</div>

<div class="col-xl-6 col-md-12 col-sm-12 mb-3">
  <button class="btn btn-block bg-danger text-white w-100 p-5" style="height: 100%" onclick="window.location='../docenti'">
    <div class="row">
      <div class="col-8 float-left">
        <h3 class="row">
          Docenti
        </h3>
        <p class="row text-left">
          Visualizza gli account dei docenti.
        </p>
      </div>
      <h1 class="col-4 ">
        <i class="fas fa-users float-right"></i>
      </h1>
    </div>
  </button>
</div>

<div class="col-xl-6 col-md-12 col-sm-12 mb-3">
  <button class="btn btn-block bg-success text-white w-100 p-5" style="height: 100%" onclick="window.location='../lezioni/?docente=<?php echo $_SESSION['user_row']['id'] ?>'">
    <div class="row">
      <div class="col-8 float-left">
        <h3 class="row">
          Lezioni create
        </h3>
        <p class="row text-left">
          Visualizza le lezioni che hai creato fin ora.
        </p>
      </div>
      <h1 class="col-4">
        <i class="fas fa-crown float-right"></i>
      </h1>
    </div>
  </button>
</div>

<div class="col-xl-6 col-md-12 col-sm-12 mb-3">
  <button class="btn btn-block bg-warning text-white w-100 p-5" style="height: 100%" onclick="window.location='../nuovaLezione'">
    <div class="row">
      <div class="col-8 float-left">
        <h3 class="row">
          Nuova lezione
        </h3>
        <p class="row text-left">
          Crea nuove lezioni che potranno visualizzare i tuoi studenti
        </p>
      </div>
      <h1 class="col-4 ">
        <i class="fas fa-plus float-right"></i>
      </h1>
    </div>
  </button>
</div>
