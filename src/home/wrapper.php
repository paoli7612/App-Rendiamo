<div class="container-fluid">
  <div class="row">
    <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
      <button class="btn btn-block btn-primary text-white w-100 p-5" onclick="window.location='../filtraMaterie'">
        <h3 class="float-right">
          Materie
        </h3>
        <h1 class="float-left">
          <i class="fas fa-book"></i>
        </h1>
      </button>
    </div>
    <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
      <button class="btn btn-block btn-danger text-white w-100 p-5" onclick="window.location='../filtraDocenti'">
        <h3 class="float-right">
          Docenti
        </h3>
        <h1 class="float-left">
          <i class="fas fa-users"></i>
        </h1>
      </button>
    </div>
    <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
      <button class="btn btn-block btn-success text-white w-100 p-5">
        <h3 class="float-right">
          Lezioni
        </h3>
        <h1 class="float-left">
          <i class="fas fa-search"></i>
        </h1>
      </button>
    </div>
    <?php if ($_SESSION['user_row'] == 'studente'): ?>
      <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
        <button class="btn btn-block btn-warning text-white w-100 p-5" onclick="window.location='../lezioni/?salvate'">
          <h3 class="float-right">
            Lezioni salvate
          </h3>
          <h1 class="float-left">
            <i class="fas fa-bookmark"></i>
          </h1>
        </button>
      </div>
    <?php endif; ?>
  </div>
</div>
