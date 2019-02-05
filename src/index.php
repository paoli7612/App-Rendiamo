<?php
  session_start();

  if ($_SESSION['login']){
    header('Location: home/');
  } else {
    header('Location: login/');
  }
?>
