  <div class="container">
    <?php include 'errori.php' ?>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Accedi</div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required="required" autofocus="autofocus">
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Accedi</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="../registrati">Primo accesso? Registrati</a>
          <a class="d-block small" href="../passwordDimenticata">Password dipenticata?</a>
        </div>
      </div>
    </div>
  </div>
