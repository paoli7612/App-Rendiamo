<div class="container">
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Registrati</div>
    <div class="card-body">
      <form method="POST">
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <label for="firstName">Nome</label>
                <input name="nome" type="text" id="firstName" class="form-control" placeholder="Nome" required="required" autofocus="autofocus" maxlength="20">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <label for="lastName">Cognome</label>
                <input name="cognome" type="text" id="lastName" class="form-control" placeholder="Cognome" required="required" maxlength="20">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <label for="inputEmail">Email</label>
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required="required" onchange="controlEmail(this.value)" maxlength="100">
          </div>
        </div>
        <div id="error">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Attenzione!</strong> Indirizzo email gia utilizzato.
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <label for="inputPassword">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" maxlength="40">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <label for="confirmPassword">Ripeti password</label>
                <input type="password" id="confirmPassword" class="form-control" placeholder="Password" required="required" maxlength="40">
              </div>
            </div>
          </div>
        </div>
        <div id="errorPassword" style="display: none">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Attenzione!</strong> Password diverse tra loro.
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
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript">

</script>
