<div class="container">
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Registrati</div>
    <div class="card-body">
      <form>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                <label for="firstName">Nome</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="lastName" class="form-control" placeholder="Last name" required="required">
                <label for="lastName">Cognome</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
            <label for="inputEmail">Email</label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                <label for="confirmPassword">Ripeti password</label>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Registrati</button>
      </form>
      <div class="text-center">
        <a class="d-block small mt-3" href="../accedi">Hai gia un account? Accedi</a>
        <a class="d-block small" href="../passwordDimenticata/">Password dimenticata?</a>
      </div>
    </div>
  </div>
</div>
