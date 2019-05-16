  <div class="container">
    <?php include 'errori.php' ?>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">
        Accedi
      </div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <div class="form-label-group">
              <label for="inputEmail">
                <i class="fas fa-user"></i> Email</label>
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required="required" autofocus="autofocus"
                <?php if (isset($_GET['email'])): ?>
                  value="<?php echo $_GET['email'] ?>"
                <?php endif; ?>>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="inputPassword">
                <i class="fas fa-key"></i> Password</label>
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Accedi</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="../registrati">Primo accesso? Registrati</a>
        </div>
      </div>
    </div>
  </div>
