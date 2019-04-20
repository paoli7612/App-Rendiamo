<?php
  session_start();
  if (isset($_SESSION['is_login'])){
    header('Location: home/');
  } else {
    header('Location: out/');
  }
?>
