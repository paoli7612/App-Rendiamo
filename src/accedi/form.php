<div class="container pt-5">
  <?php include 'errori.php' ?>
  <div class="d-flex justify-content-center">
    <img src="../__img/logo.png">
  </div>
  <div class="card card-login mx-auto mt-5">
    <div class="card-header">Accedi</div>
    <div class="card-body">
      <form method="post">
        <div class="form-group">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i></span>
              </div>
            <input name="email" type="email" class="form-control" placeholder="Email" required="required" autofocus="autofocus">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input name="password" type="password" class="form-control" placeholder="Password" required="required">
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Accedi</button>
      </form>
      <div class="text-center">
        <a class="d-block small mt-3" href="../registrati/">Registra un nuovo account</a>
        <a class="d-block small" href="../passwordDimenticata/">Password dimenticata?</a>
      </div>
    </div>
  </div>
</div>
