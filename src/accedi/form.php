<?php include 'errori.php' ?>
<div class="loginBox">
  <img src="../__img/mc.png" class="logo">
  <h2>Log In Here </h2>
  <form method="post">
    <p>Email</p>
    <input type="text" name="email" placeholder="Enter Email"
      value="<?php if(isset($_GET['email'])) echo $_GET['email'] ?>">
    <p>Password</p>
    <input type="password" name="password" placeholder="********">
    <input type="submit" name="" value="Sign In">
    <a href="../passwordDimenticata/">Forget Password ?</a>
</div>
